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

#Lecture du fichier csv selon le séparateur
if (se=="space"):
	data = pd.read_csv('/home/ali/stage/public/regression/datasets/'+fich,sep ='\s+')
elif (se=="tab"):
	data = pd.read_csv('/home/ali/stage/public/regression/datasets/'+fich,sep ='\t')
elif (se=="comma"):
	data = pd.read_csv('/home/ali/stage/public/regression/datasets/'+fich,sep =',')
elif (se=="semicolon"):
	data = pd.read_csv('/home/ali/stage/public/regression/datasets/'+fich,sep =';')
else:
	data = pd.read_csv('/home/ali/stage/public/regression/datasets/'+fich,sep =':')

#Récupération des noms des colonnes à manipuler
fichier = open("tmp_reg2.txt","r")
numb_att = fichier.readline()
gestion_na = fichier.readline()
col = []
for i in range (int(numb_att)):
	a=fichier.readline()
	a=a[:-1]
	col.append(a)	


data = data[col]

#Gestion des valeurs manquantes selon la méthode choisie par l'utilisateur
if(gestion_na[:-1]=="remplacer"):
    for col in data.columns: 
        data[col]=data[col].fillna(value=data[col].mean())
else:
    data = data.dropna(axis=0)

y = data[tuple(args.target)[0][:-1]]

X = data.drop([tuple(args.target)[0][:-1]],axis=1)

y = np.array(y)
y=y.reshape(y.shape[0], 1)

x=np.array(X).reshape(y.shape[0],int(numb_att)-1)

M = np.hstack((np.ones(x.shape),x))

M2 = np.hstack((M,x**2))

theta = np.random.randn(2, 1)

theta2 = np.random.randn(3, 1)

def model(X, theta):
    return X.dot(theta)

#Ajustement affine
t1= np.transpose(M).dot(M)
t2= np.transpose(y).dot(M)
t3= np.linalg.inv(t1)
theta_final=t3.dot(np.transpose(t2))

#Régression polynomiale
t1= np.transpose(M2).dot(M2)
t2= np.transpose(y).dot(M2)
t3= np.linalg.inv(t1)
theta_final2=t3.dot(np.transpose(t2))

# création d'un vecteur prédictions qui contient les prédictions de notre modele final
predictions = model(M, theta_final)

predictions2 = model(M2, theta_final2)

def droite(x):
    return theta_final[0]+theta_final[1]*x

#Représentation des résultats du modèle d'ajustement affine
fig=plt.figure()
plt.scatter(x,y)
plt.scatter(x[:,0], predictions, c='r')
plt.plot(x, droite(x), 'r-') # Droite rouge
plt.ylabel(tuple(args.target)[0][:-1])
plt.xlabel(X.columns[0])
fig.suptitle('Y='+str(round(theta_final[1][0],2))+'X+'+str(round(theta_final[0][0],2)))
fig.savefig("modele.png")
plt.close()

#Représentation des résultats de régression polynomiale du deuxième degré
fig=plt.figure()
plt.scatter(x,y)
xs, ys = zip(*sorted(zip(x[:,0], predictions2)))
plt.plot(xs, ys, marker='o', color='r', linestyle='-')
plt.plot(x, droite(x), 'b-', linewidth=0.5) # Red straight line
plt.ylabel(tuple(args.target)[0][:-1])
plt.xlabel(X.columns[0])
fig.suptitle('Y='+str(round(theta_final2[2][0],4))+'X\u00b2+'+str(round(theta_final2[1][0],2))+'X+'+str(round(theta_final2[0][0],2)))
fig.savefig("modele_polynomial.png")
plt.close()


#Régression linéaire avec Scikit-Learn
model2 = LinearRegression()
model2.fit(x,y)
model2.score(x,y)
predictions = model2.predict(x)

#Reprsentation des résultats du modèle précédent
fig=plt.figure()
plt.scatter(x,y)
plt.plot(x,predictions,c='r')
plt.ylabel(tuple(args.target)[0][:-1])
plt.xlabel(X.columns[0])
fig.suptitle('Y='+str(round(model2.coef_[0][0],2))+'X+'+str(round(model2.intercept_[0],2)))
fig.savefig("modele2.png")
plt.close()

