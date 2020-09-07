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
import seaborn as sns
from math import exp
from math import gamma
from math import sqrt
from math import pi

def d_expo(l,x):
	if (x>=0):
		return l*exp(-l*x)
	else:
		return 0

def d_gauss(m,s,x):
	a=1/(s*sqrt(2*pi))
	b=((x-m)/s)**2
	return a*exp(-b/2)

def d_lognorm(m,s,x):
	return (1/x)*d_gauss(m,s,np.log(x))

def d_unif(a,b,x):
	if (x>=a and x<=b):
		return 1/(b-a)
	else:
		return 0

def d_gamma(k,t,x):
	a=x**(k-1)
	b=(t**k)*exp(-t*x)
	return a*b/gamma(k)

def d_khi(k,x):
	a=x**((k/2)-1)
	b=exp(-x/2)
	return a*b/((2**(k/2))*gamma(k/2))


parser = argparse.ArgumentParser()
parser.add_argument('loi', metavar='L', type=str, nargs='+',
                    help='la loi')
#parser.add_argument('integers', metavar='N', type=int, nargs='+',
#                    help='an integer for the accumulator')
parser.add_argument('--integers', nargs='+', type=float)
args = parser.parse_args()

taille=tuple(args.integers)[0]
param1=tuple(args.integers)[1]
param2=tuple(args.integers)[2]
if (tuple(args.loi)[0]=="expo"):
    data=expon.rvs(scale = param1,  size = int(taille))
elif (tuple(args.loi)[0]=="binom"):
    data=np.random.binomial(int(param1), param2, int(taille))
elif (tuple(args.loi)[0]=="gauss"):
    data=np.random.normal(param1, param2, int(taille))
elif (tuple(args.loi)[0]=="poisson"):
    data=scipy.stats.poisson.rvs(mu = int(param1), size = int(taille))
elif (tuple(args.loi)[0]=="unif"):
    data=np.random.uniform(param1, param2, int(taille))
elif (tuple(args.loi)[0]=="gamma"):
    data=np.random.gamma(param1, 1/param2, int(taille))
elif (tuple(args.loi)[0]=="khi"):
    data=np.random.chisquare(param1, int(taille))
elif (tuple(args.loi)[0]=="lognorm"):
    data=np.random.lognormal(param1, param2, int(taille))
elif (tuple(args.loi)[0]=="geom"):
    data=np.random.geometric(param1, int(taille))
else:
    data=np.random.randn(int(taille))

if (tuple(args.loi)[0] in ["poisson","binom","geom"]):
#    data=list(data)
#    mondic={}
#    for x in sorted(data):
#        mondic[x]=data.count(x)
#    valeurs=[v for v in mondic.keys()]
#    effectif=[e for e in mondic.values()]
#    for k,v in mondic.items():
#        plt.bar(k,v,width=0.8)
#        plt.text(k-0.2,v,v)

#    plt.xticks(valeurs,valeurs)
#    plt.savefig('histo.png')
    histo_discretes(data,nom="histo")
    
else:
#    n, bins, patches = plt.hist(data, bins=15, color='#0504aa',
#                           alpha=0.7,edgecolor = 'black')
#    ax = plt.gca()
#   for count, patch in zip(n,patches):
#        ax.annotate(str(int(count)), xy=(patch.get_x(), patch.get_height()))
#        plt.xlabel('Valeurs')
#        plt.ylabel('Effectifs')
#        plt.title('Histogramme')
#        maxfreq = n.max()
#        # Set a clean upper y-axis limit.
#        plt.ylim(ymax=maxfreq + 30)
#        plt.savefig('histo.png')
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

def Mode_D(data):
    data=list(data)
    Dic={}
    for x in sorted(data):
        Dic[x]=data.count(x)
       
    Valeurs=[t for t in Dic.keys()]
    Effectifs=[t for t in Dic.values()]
    n_max=max(Effectifs)
   
    return [x for x in Valeurs if Dic[x]==n_max]

Xdensite = np.linspace(np.min(data)-10, np.max(data)+10, 1000)
if (tuple(args.loi)[0]=="expo"):
	Xdensite = np.linspace(0, -np.log(0.02)/param1, 1000)
	Ydensite=np.array([d_expo(param1,xi) for xi in Xdensite])
	plt.plot(Xdensite,Ydensite)
	plt.savefig("densite.png")
elif (tuple(args.loi)[0]=="gauss"):
	Xdensite = np.linspace(param1-4*param2, param1+4*param2, 1000)
	Ydensite=np.array([d_gauss(param1,param2,xi) for xi in Xdensite])
	plt.plot(Xdensite,Ydensite)
	plt.savefig("densite.png")
elif (tuple(args.loi)[0]=="unif"):
	Xdensite = np.linspace(param1-1, param2+1, 1000)
	Ydensite=np.array([d_unif(param1,param2,xi) for xi in Xdensite])
	plt.plot(Xdensite,Ydensite)
	plt.savefig("densite.png")
elif (tuple(args.loi)[0]=="gamma"):
	Xdensite = np.linspace(0, np.max(data)+10, 1000)
	Ydensite=np.array([d_gamma(param1,1/param2,xi) for xi in Xdensite])
	plt.plot(Xdensite,Ydensite)
	plt.savefig("densite.png")
elif (tuple(args.loi)[0]=="khi"):
	Xdensite = np.linspace(0, np.max(data)+10, 1000)
	Ydensite=np.array([d_khi(param1,xi) for xi in Xdensite])
	plt.plot(Xdensite,Ydensite)
	plt.savefig("densite.png")
elif (tuple(args.loi)[0]=="lognorm"):
	Ydensite=np.array([d_lognorm(param1,param2,xi) for xi in Xdensite])
	plt.plot(Xdensite,Ydensite)
	plt.savefig("densite.png")

else:
    data=np.random.randn(int(taille))


print(round(np.min(data),5))
print(round(np.max(data),5))
print(round(np.mean(data),5))
print(round(np.var(data),5))
print(round(np.std(data),5))
if (tuple(args.loi)[0] in ["poisson","binom","geom"]):
    print(Mode_D(data))
else :
    print(Mode_C(data,13))
print(round(scipy.stats.skew(data),5))
print(round(scipy.stats.kurtosis(data),5))
print(data)
