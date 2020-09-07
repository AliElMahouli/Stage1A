import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
from sklearn.neighbors import KNeighborsClassifier
from Librairie_version16062020 import*
import argparse
import functools
import random
import scipy.stats
from sklearn.cluster import KMeans

parser = argparse.ArgumentParser()
parser.add_argument('--fich', metavar='L', type=str, nargs='+',
                    help='le dataset') 
parser.add_argument('--na', metavar='N', type=str, nargs='+',
                    help='gestion na')
parser.add_argument('--target', metavar='T', type=int, nargs='+',
                    help='target attribut')
parser.add_argument('--sep', metavar='L', type=str, nargs='+',
                    help='le séparateur')
parser.add_argument('--att', nargs='+', type=str)

                    
args = parser.parse_args()

nb=tuple(args.target)[0]

fich=tuple(args.fich)[0]

se=tuple(args.sep)[0]

#Lecture du fichier csv selon le séparateur
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


#Création de la liste des attributs utilisés pour la représentation des résultats dans une figure
val = []

for att in tuple(args.att):
	val.append(att[:-1])

print(val)

#Récupération des noms des colonnes et les indices des colonnes dans la liste précédente
fichier = open("tmp_clu2.txt","r")
numb_att = fichier.readline()
col = []
ind = []
for i in range (int(numb_att)):
	a=fichier.readline()
	a=a[:-1]
	col.append(a)	
	if (a in val):
		ind.append(i)   

print(ind)

data = data[col]

#Gestion des valeurs manquantes selon la méthode choisie par l'utilisateur
if(tuple(args.na)[0]=="remplacer"):
    for col in data.columns: 
        data[col]=data[col].fillna(value=data[col].mean())
else:
    data = data.dropna(axis=0)

X = data

#KMeans
x=np.array(X).reshape(X.shape[0],int(numb_att))
model = KMeans(n_clusters=int(nb),)
model.fit(x)
predictions = model.predict(x)

#Exportation du nouveau fichier csv avec la colonne cluster
data_fin=X
data_fin['cluster']=predictions
if (se=="space"):
	data_fin.to_csv('result/data_clusters.csv',sep = ' ', index=False , float_format='%.4f')
elif (se=="tab"):
	data_fin.to_csv('result/data_clusters.csv',sep = '\t', index=False , float_format='%.4f')
elif (se=="comma"):
	data_fin.to_csv('result/data_clusters.csv',sep = ',', index=False , float_format='%.4f')
elif (se=="semicolon"):
	data_fin.to_csv('result/data_clusters.csv',sep = ';', index=False , float_format='%.4f')
else:
	data_fin.to_csv('result/data_clusters.csv',sep = ':', index=False , float_format='%.4f')

#Représentation des résultats selon les attributs choisis par l'utilisateur
if (len(val)==1):
	plt.scatter(np.linspace(0,10,x.shape[0]).reshape(x.shape[0],1),x[:,ind[0]], c=predictions)
	plt.ylabel(val[0][:-1])
else:
	plt.scatter(x[:,ind[0]],x[:,ind[1]], c=predictions)
	plt.xlabel(val[0][:-1])
	plt.ylabel(val[1][:-1])
plt.savefig("modele.png")
plt.close()



