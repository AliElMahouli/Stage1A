import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import numpy as np
from sklearn.datasets import make_regression
from sklearn.neighbors import KNeighborsClassifier
from sklearn.ensemble import BaggingClassifier, RandomForestClassifier
from Librairie_version16062020 import*
import argparse
import functools
import random
import scipy.stats
from scipy import *

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

#Lecture du fichier csv selon le séarateur
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


fichier = open("tmp_cla2.txt","r")
fichier2 = open("att_values.txt","r")
numb_att = fichier.readline()

fichier2.readline()
fichier2.readline()

#Initiation de la liste des caractéristiques
col = []

#Initiation de la liste des valeurs des caractéristiques
val = []

for i in range (int(numb_att)):
    col.append(fichier.readline())
    val.append(fichier2.readline())

for i in range (int(numb_att)):
    col[i]=col[i][:-1]
    val[i]=val[i][:-1]

#Suppression de la valeur donnée au Target 
for i in range (int(numb_att)):
    if (col[i]==tuple(args.target)[0][:-1]):
        val.pop(i)


for i in range (len(val)):
    val[i]=float(val[i])
    
data = data[col]


#Gestion des valeurs manquantes selon la méthode choisie par l'utilisateur
if(tuple(args.na)[0]=="remplacer"):
    for col in data.columns: 
        data[col]=data[col].fillna(value=data[col].mean())
else:
    data = data.dropna(axis=0)

X = data

#Séparation du Target du reste des caractéristiques
y = data[tuple(args.target)[0][:-1]]

X = data.drop([tuple(args.target)[0][:-1]],axis=1)

#Passage aux matrices Numpy
Y2 = np.array(y)

Y2=Y2.reshape(Y2.shape[0], 1)

X2=np.array(X).reshape(Y2.shape[0],int(numb_att)-1)

M = np.hstack((np.ones(Y2.shape),X))

theta = np.random.randn(int(numb_att), 1)

t1= np.transpose(M).dot(M)
t2= np.transpose(Y2).dot(M)
t3= np.linalg.inv(t1)
theta_final=t3.dot(np.transpose(t2))

def sigmoid(x):
    return 1 / (1 + np.exp(-x))

def net_input(theta, x):
    return np.dot(x, theta)

def probability(theta, x):
    return sigmoid(net_input(theta, x))

def predict(x):
    return probability(theta_final, x)

def accuracy(x, actual_classes, probab_threshold=0.5):
    predicted_classes = (predict(x) >= 
                         probab_threshold).astype(int)
    predicted_classes = predicted_classes.flatten()
    accuracy = np.mean(predicted_classes == actual_classes)
    return accuracy

x = np.array(val).reshape(1,int(numb_att)-1)
val = [1] + val
x2 = np.array(val).reshape(1,int(numb_att))
print(round(accuracy(M, Y2),5))
print([int(predict(x2)[0][0]>=0.5)])


#Les plus proches voisins
model = KNeighborsClassifier()
model.fit(X,y)
print(round(model.score(X,y),5))
print(model.predict(x))


#Bagging Classifier
model2 = BaggingClassifier(base_estimator=KNeighborsClassifier(),n_estimators=100)
model2.fit(X,y)
print(round(model2.score(X,y),5))
print(model2.predict(x))


#Random Forest
model3 = RandomForestClassifier(n_estimators=100)
model3.fit(X,y)
print(round(model3.score(X,y),5))
print(model3.predict(x))
