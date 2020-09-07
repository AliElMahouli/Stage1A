import numpy as np
from sklearn.datasets import make_regression
import matplotlib.pyplot as plt
from Librairie_version16062020 import*
import argparse
import functools
import random
import numpy as np
import scipy.stats
from scipy.stats import expon
import matplotlib.pyplot as plt

parser = argparse.ArgumentParser()
parser.add_argument('loi', metavar='L', type=str, nargs='+',
                    help='la loi')
args = parser.parse_args()
from sklearn.linear_model import LinearRegression

fich=tuple(args.loi)[0]
f = open(fich, "r")
y=f.readlines()
for i in range (len(y)):
    y[i]=float(y[i])

import pandas
data_x01=pandas.read_csv('./Donnees_Reg/x01.txt',skiprows=33, delim_whitespace=True,  header=None,
                         names=['index','Brain_Weight','Body_Weight'])


# skiprows=33 :  on ignore les 33 premières lignes

# names=['index','Brain_Weight','Body_Weight'] : noms  des colonnes

data_x01=data_x01[['Brain_Weight','Body_Weight']]

# transformer les données en float
data_x01=data_x01.astype({"Brain_Weight":'float64', "Body_Weight":'float64'})
y = np.array(data_x01['Brain_Weight'])
y=y.reshape(y.shape[0], 1)
x=np.array(data_x01['Body_Weight']).reshape(y.shape[0],1)

M = np.hstack((np.ones(x.shape),x))

theta = np.random.randn(2, 1)

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

def droite(x):
    return theta_final[0]+theta_final[1]*x

# Affiche les résultats de prédictions (en rouge) par rapport a notre Dataset (en bleu)
plt.scatter(x,y)
plt.scatter(x[:,0], predictions, c='r')
plt.plot(x, droite(x), 'r-') # Red straight line
plt.savefig("modele.png")
plt.close()

model2 = LinearRegression()
model2.fit(x,y)
model2.score(x,y)
predictions = model2.predict(x)

plt.scatter(x,y)
plt.plot(x,predictions,c='r')
plt.savefig("modele2.png")
plt.close()
