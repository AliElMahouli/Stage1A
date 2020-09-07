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

if (args.att is not None):
    for att in tuple(args.att):
        data = data.drop([att[:-1]],axis=1)

print(len(data.columns))
print(tuple(args.na)[0])

for col in data.columns: 
    print(col)

if(tuple(args.na)[0]=="remplacer"):
    for col in data.columns: 
        data[col]=data[col].fillna(value=data[col].mean())
else:
    data = data.dropna(axis=0)


