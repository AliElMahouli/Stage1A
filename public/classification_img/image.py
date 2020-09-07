from tensorflow.keras.preprocessing.image import ImageDataGenerator
from tensorflow.keras.preprocessing import image
from tensorflow.keras.optimizers import RMSprop
import matplotlib.pyplot as plt
import matplotlib.image as mpimg
import tensorflow as tf
import numpy as np
import os

train = ImageDataGenerator(rescale=1/255)

train_dataset = train.flow_from_directory("train/",target_size=(200,200),batch_size=3, class_mode="binary")

print(train_dataset.class_indices)

print(train_dataset.classes)

fileclasse = open("classes_noms.txt","r")
classe0 = fileclasse.readline()
classe1 = fileclasse.readline()

model = tf.keras.models.Sequential([tf.keras.layers.Conv2D(16,(3,3),activation='relu',input_shape=(200,200,3)),tf.keras.layers.MaxPool2D(2,2),
                                    #
                                    tf.keras.layers.Conv2D(32,(3,3),activation='relu'),tf.keras.layers.MaxPool2D(2,2),
                                    #
                                    tf.keras.layers.Conv2D(64,(3,3),activation='relu'),tf.keras.layers.MaxPool2D(2,2),
                                    ##
                                    tf.keras.layers.Flatten(),
                                    ##
                                    tf.keras.layers.Dense(512,activation='relu'),
                                    ##
                                    tf.keras.layers.Dense(1,activation='sigmoid')])

model.compile(loss='binary_crossentropy',optimizer=RMSprop(lr=0.001),metrics=['accuracy'])

model_fit = model.fit(train_dataset,steps_per_epoch=5,epochs=30)
                                    
                                                    
from os import listdir
from os.path import isfile, join
onlyfiles = [f for f in listdir("target/") if isfile(join("target/", f))]

print(onlyfiles)

for fichier in onlyfiles:
	img = image.load_img("target/"+fichier,target_size=(200,200))
	X=image.img_to_array(img)
	X=np.expand_dims(X,axis=0)
	images = np.vstack([X])
	val = model.predict(images)
	img=mpimg.imread("target/"+fichier)
	plt.imshow(img)
	if (int(val[0][0])==0):
		plt.title('Classe : ' + classe0)
	else:
		plt.title('Classe : ' + classe1)
	plt.savefig("result/"+fichier)
	plt.close()
