import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import numpy as np
from sklearn.datasets import make_regression
from Librairie_version16062020 import*
import argparse
import functools
import random
import scipy.stats

parser = argparse.ArgumentParser()
parser.add_argument('loi', metavar='L', type=str, nargs='+',
                    help='la loi')
parser.add_argument('--sep', metavar='L', type=str, nargs='+',
                    help='le séparateur')
args = parser.parse_args()

fich=tuple(args.loi)[0]

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

print(len(data.columns))

for col in data.columns: 
    print(col)

#print(data.describe())
