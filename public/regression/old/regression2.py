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
f = open("datasets/"+fich, "r")
y=f.readlines()
for i in range (len(y)):
    y[i]=float(y[i])


np.random.seed(0)
m = len(y)
y=np.array(y).reshape(m,1)
X = np.linspace(0,10,m).reshape(m,1)

model = LinearRegression()
model.fit(X,y)
model.score(X,y)

predictions = model.predict(X)

plt.scatter(X,y)
plt.plot(X,predictions,c='r')
plt.savefig("modele.png")
