import sys
sys.path.append("/usr/lib/python3/dist-packages/")
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
parser.add_argument('--typedist', metavar='L', type=str, nargs='+',
                    help='le type de distribution')
args = parser.parse_args()

typedist=tuple(args.typedist)[0]
fich=tuple(args.loi)[0]
path = "datasets/" + fich
data=Lecture_data(path)
#for i in range (len(data)):
#    data[i]=float(data[i])
    
if (typedist=="discrete"):
    histo_discretes(data,nom="histo")    
else:
	histo_Continue(data,13,nom="histo")


def Moment_r(data,r):
    fonc_r= lambda x : x**r
    S=functools.reduce( lambda x, y: x+y,map(fonc_r,data))
    return S/(1.0*len(data))

def Moment_cr(data,r):
    m=Moment_r(data,1)
    fonc_r= lambda x : (x-m)**r
    S=functools.reduce(lambda x, y: x+y,map(fonc_r,data))
    return S/(1.0*len(data))

def derivee_num(fonction,x0,h=1e-06):
    return (fonction(x0+0.5*h)-fonction(x0-0.5*h))/h

def derivee_ieme(fonction,x0,i,h=1e-06):
    x1=list(x0)
    x2=list(x0)
    x1[i-1]=x1[i-1]+0.5*h
    x2[i-1]=x2[i-1]-0.5*h
    return (fonction(*tuple(x1))-fonction(*tuple(x2)))/h

def gradient(fonction,x0):
    g=[]
    for i in range (len(x0)):
        g.append(derivee_ieme(fonction,x0,i+1,h=1e-06))
    return tuple(g)

def hessienne(fonction,x0):
    h = np.empty((0, len(x0)), float)
    eps=1e-06
    for i in range (len(x0)):
        s=[]
        x1=list(x0)
        x2=list(x0)
        x1[i]=x1[i]+eps
        x2[i]=x2[i]-eps
        for j in range(len(x0)):
            if i==j:
                x3=x1
                x4=x2
                x3[j]=x3[j]+eps
                x4[j]=x4[j]-eps
                x1[j]=x1[j]-eps
                x2[j]=x2[j]+eps
                a=fonction(*tuple(x3))+fonction(*tuple(x4))
                b=fonction(*tuple(x1))+fonction(*tuple(x2))
            else:
                a=fonction(*tuple(x1))+fonction(*tuple(x2))
                b=2*fonction(*x0)
            s.append((a-b)/(4*eps))
        h=np.append(h,np.array([s]),axis=0)
    return h

print(len(data))
print(round(np.min(data),5))
print(round(np.max(data),5))
print(round(np.mean(data),5))
print(round(np.var(data),5))
print(round(np.std(data),5))
if (typedist=="discrete"):
    print(Mode_D(data))
else :
    print(Mode_C(data,13))
print(round(scipy.stats.skew(data),5))
print(round(scipy.stats.kurtosis(data),5))
