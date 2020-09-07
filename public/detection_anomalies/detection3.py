import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import numpy as np
from sklearn.ensemble import IsolationForest
import matplotlib.patches as mpatches
from Librairie_version16062020 import*
import argparse
import functools
import random
import scipy.stats

parser = argparse.ArgumentParser()
parser.add_argument('--fich', metavar='L', type=str, nargs='+',
                    help='le dataset') 
parser.add_argument('--na', metavar='N', type=str, nargs='+',
                    help='gestion na')
parser.add_argument('--target', metavar='T', type=float, nargs='+',
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
	data = pd.read_csv('/home/ali/stage/public/detection_anomalies/datasets/'+fich,sep ='\s+')
elif (se=="tab"):
	data = pd.read_csv('/home/ali/stage/public/detection_anomalies/datasets/'+fich,sep ='\t')
elif (se=="comma"):
	data = pd.read_csv('/home/ali/stage/public/detection_anomalies/datasets/'+fich,sep =',')
elif (se=="semicolon"):
	data = pd.read_csv('/home/ali/stage/public/detection_anomalies/datasets/'+fich,sep =';')
else:
	data = pd.read_csv('/home/ali/stage/public/detection_anomalies/datasets/'+fich,sep =':')


#Création de la liste des attributs utilisés pour la représentation des résultats dans une figure
val = []

for att in tuple(args.att):
	val.append(att[:-1])

print(val)

#Récupération des noms des colonnes et les indices des colonnes dans la liste précédente
fichier = open("tmp_det2.txt","r")
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

X=data

#Isolation Forest
x=np.array(X).reshape(X.shape[0],int(numb_att))
model = IsolationForest(n_estimators=50,contamination=float(nb))
model.fit(x)
predictions = model.predict(x)

#Exportation du nouveau fichier csv avec la colonne anomalies
data_fin=X
data_fin['anomalies']=predictions
if (se=="space"):
	data_fin.to_csv('result/data_anomalies.csv',sep = ' ', index=False , float_format='%.4f')
elif (se=="tab"):
	data_fin.to_csv('result/data_anomalies.csv',sep = '\t', index=False , float_format='%.4f')
elif (se=="comma"):
	data_fin.to_csv('result/data_anomalies.csv',sep = ',', index=False , float_format='%.4f')
elif (se=="semicolon"):
	data_fin.to_csv('result/data_anomalies.csv',sep = ';', index=False , float_format='%.4f')
else:
	data_fin.to_csv('result/data_anomalies.csv',sep = ':', index=False , float_format='%.4f')

if (len(val)==1):
	fig=plt.figure()
	fig.suptitle('Taux de contamination : '+str(nb))
	plt.scatter(np.linspace(0,10,x.shape[0]).reshape(x.shape[0],1),x[:,ind[0]], c=predictions)
	plt.ylabel(val[0][:-1])
else:
	fig=plt.figure()
	plt.scatter(x[:,ind[0]],x[:,ind[1]], c=predictions)
	plt.xlabel(val[0][:-1])
	plt.ylabel(val[1][:-1])
	fig.suptitle('Taux de contamination : '+str(nb))	

red_patch = mpatches.Patch(color='yellow', label='normale')
blue_patch = mpatches.Patch(color='purple', label='anomalie') 
patches = [red_patch, blue_patch]	
plt.legend(handles=patches)
fig.savefig("modele2.png")
plt.close()

