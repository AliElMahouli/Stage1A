import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import numpy as np
from sklearn.datasets import make_regression
from sklearn.neighbors import KNeighborsClassifier
from Librairie_version16062020 import*
import argparse
import functools
import random
import scipy.stats
from sklearn.linear_model import LinearRegression

parser = argparse.ArgumentParser()
parser.add_argument('--fich', metavar='L', type=str, nargs='+',
                    help='le dataset') 
parser.add_argument('--na', metavar='N', type=str, nargs='+',
                    help='gestion na')
parser.add_argument('--target', metavar='T', type=str, nargs='+',
                    help='target attribut')
parser.add_argument('--sep', metavar='L', type=str, nargs='+',
                    help='le séparateur')
parser.add_argument('--att', nargs='+', type=str)

                    
args = parser.parse_args()

fich=tuple(args.fich)[0]

se=tuple(args.sep)[0]

if (se=="space"):
	data = pd.read_csv('/home/ali/stage/public/clustering/datasets/'+fich,sep ='\s+')
elif (se=="tab"):
	data = pd.read_csv('/home/ali/stage/public/clustering/datasets/'+fich,sep ='\t')
elif (se=="comma"):
	data = pd.read_csv('/home/ali/stage/public/clustering/datasets/'+fich,sep =',')
elif (se=="semicolon"):
	data = pd.read_csv('/home/ali/stage/public/clustering/datasets/'+fich,sep =';')
else:
	data = pd.read_csv('/home/ali/stage/public/clustering/datasets/'+fich,sep =':')

val = []

for att in tuple(args.att):
	val.append(att[:-1])

print(val)

fichier3 = open("xindex.txt","w")
fichier = open("tmp_reg2.txt","r")
numb_att = fichier.readline()
gestion_na = fichier.readline()
fichier3.write(str(len(val))+"\n")    

col = []
for i in range (int(numb_att)):
	a=fichier.readline()
	a=a[:-1]
	col.append(a)	


# Choix des attributs pertinants
data = data[col]


# Gestion des valeurs manquantes
if(gestion_na[:-1]=="remplacer"):
    for col in data.columns: 
        data[col]=data[col].fillna(value=data[col].mean())
else:
    data = data.dropna(axis=0)


y = data[tuple(args.target)[0][:-1]]

X = data.drop([tuple(args.target)[0][:-1]],axis=1)

# Indices des attributs pour les figures
ind = []
for i in range (len(X.columns)):
	if (X.columns[i] in val):
		ind.append(i)
		fichier3.write(str(i)+"\n")    

print(ind)

y = np.array(y)
y=y.reshape(y.shape[0], 1)

x=np.array(X).reshape(y.shape[0],int(numb_att)-1)

M = np.hstack((np.ones(y.shape),x))

theta = np.random.randn(int(numb_att), 1)

def model(X, theta):
    return X.dot(theta)

def cost_function(X, y, theta):
    m = len(y)
    return 1/(2*m) * np.sum((model(X, theta) - y)**2)



t1= np.transpose(M).dot(M)
t2= np.transpose(y).dot(M)
t3= np.linalg.inv(t1)
theta_final=t3.dot(np.transpose(t2))

# création d'un vecteur prédictions qui contient les prédictions de notre modele final
predictions = model(M, theta_final)


expr='Y='+str(round(theta_final[0][0],2));

for j in range (len(X.columns)):
	expr=expr+'+'+str(round(theta_final[len(X.columns)-1-j][0],4))+'X_{'+X.columns[j]+'}'

def droite(x):
    return theta_final[0]+theta_final[1]*x

# Affiche les résultats de prédictions (en rouge) par rapport a notre Dataset (en bleu)
for j in range(len(val)):
	fig=plt.figure()
	plt.scatter(x[:,ind[j]],y)
	plt.scatter(x[:,ind[j]], predictions, c='r')
	plt.ylabel(tuple(args.target)[0][:-1])
	plt.xlabel(val[j][:-1])
	fig.suptitle(expr)
	fig.savefig("modele"+str(j)+".png")
	plt.close()

model2 = LinearRegression()
model2.fit(x,y)
model2.score(x,y)
predictions = model2.predict(x)

