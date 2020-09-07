import pandas as pd
import numpy as np
import argparse

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
	data = pd.read_csv('/home/ali/stage/public/regression_multiple/datasets/'+fich,sep ='\s+')
elif (se=="tab"):
	data = pd.read_csv('/home/ali/stage/public/regression_multiple/datasets/'+fich,sep ='\t')
elif (se=="comma"):
	data = pd.read_csv('/home/ali/stage/public/regression_multiple/datasets/'+fich,sep =',')
elif (se=="semicolon"):
	data = pd.read_csv('/home/ali/stage/public/regression_multiple/datasets/'+fich,sep =';')
else:
	data = pd.read_csv('/home/ali/stage/public/regression_multiple/datasets/'+fich,sep =':')


#Supprimer les colonnes à ignorer 
if (args.att is not None):
    for att in tuple(args.att):
        data = data.drop([att[:-1]],axis=1)

#Récupération du nombre de colonnes restantes
print(len(data.columns))

#Récupération de la méthode de gestion de valeurs manquantes
print(tuple(args.na)[0])

#Récupération des noms des colonnes restantes
for col in data.columns: 
    print(col)

