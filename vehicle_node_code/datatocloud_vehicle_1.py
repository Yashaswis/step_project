#vehicle 2
import serial
import time
import string
import pynmea2
import spidev # To communicate with SPI devices
from numpy import interp	# To scale values
from time import sleep	# To add delay
import RPi.GPIO as GPIO	# To use GPIO pins

from time import sleep
import urllib2
import requests

import time
import Adafruit_GPIO.SPI as SPI
import Adafruit_SSD1306
from PIL import Image
from PIL import ImageDraw
from PIL import ImageFont
import subprocess
#
# MACRO Definations

VEHICLEID = "V00002"
GE0_LOACTION = "GL2"
KEY = "KEY"
''' Data format V00001GL1KEYRRRRxxxyyyyzzzzTTTTLNGTDLTTD '''

'''' display intilaization'''
print("debug Messages --")
print("VEHICLEID = ",VEHICLEID)
RST = 0
BRAKE_SENSOR_PIN = 21
GPIO.setmode(GPIO.BCM)

GPIO.setup(BRAKE_SENSOR_PIN,GPIO.IN)
GPIO.setup(BRAKE_SENSOR_PIN, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
''' Variables declaration '''

Traffic_Count  = 10
latDefault = "77.0932"
lngDefault = "13.3180"
lat = latDefault
lng = lngDefault

''' ''''data intialization'''
baseURL = 'http://ayash.in/testurl/ir.php?z='
# Start SPI connection
spi = spidev.SpiDev() # Created an object
spi.open(0,0)

def analogInput(channel):
  spi.max_speed_hz = 1350000
  adc = spi.xfer2([1,(8+channel)<<4,0])
  data = ((adc[1]&3) << 8) + adc[2]
  return data


while True: 
        if((GPIO.input(BRAKE_SENSOR_PIN))==True):
          Traffic_Count +=10
          print("BRAKE Pressed ")
        else:
          Traffic_Count -=10
          print("BRAKE  NOT Pressed ")
          if(Traffic_Count<=0):
            Traffic_Count = 0
        x_axis = analogInput(0) # Reading from CH0
        y_axis = analogInput(1) # Reading from CH1
        z_axis = analogInput(2) # Reading from CH
        rain_value = analogInput(3) # Reading from CH3
        print ("x_axis= ",x_axis, "y_axis=",y_axis , "z_axis=",z_axis)
        print ("rain_value = ",rain_value)
        
        sleep(1)
        port="/dev/ttyAMA0"
        ser=serial.Serial(port, baudrate=9600, timeout=0.5)
        dataout = pynmea2.NMEAStreamReader()
        newdata=ser.readline()
        data1 = "gps"

        if newdata[0:6] == "$GPRMC":
            newmsg=pynmea2.parse(newdata)
            lat1=newmsg.latitude
            lng1=newmsg.longitude
            lat= str(lat1)
            lng= str(lng1)
            newdata = "temp11"
            gps = "Latitude=" + str(lat) + "andLongitude=" + str(lng)
            print(gps)
            data1= gps
            if(lat1 ==0.0) :
                print (lat)
                lat = latDefault
                lng = lngDefault
                
            else:
                print (lat)
                    
        #data= data1 +"x"+str(x_axis)+"y"+str(y_axis)+"z"+str(z_axis)+"rainvalue"+str(rain_value)
        data=  VEHICLEID + GE0_LOACTION + KEY +str((rain_value)).zfill(4)+str((x_axis)).zfill(4)+str((y_axis)).zfill(4)+str((z_axis)).zfill(4)+str((Traffic_Count)).zfill(4)+(lat[0:7])+(lng[0:7])
#        data=  VEHICLEID + GE0_LOACTION + KEY +str((rain_value)).zfill(4)+str((Traffic_Count)).zfill(4)+str((x_axis)).zfill(4)+str((y_axis)).zfill(4)+str((z_axis)).zfill(4)+str((lat)).zfill(5)+str((lng)).zfill(5)
        print(data)
        url = baseURL +str(data)
        print(url)
        url = urllib2.urlopen(baseURL +str(data))
  
        # Display image.
 #       disp.image(image1)
  #      disp.display()
       # time.sleep(20)

        time.sleep(15)
   #     Traffic_Count = Traffic_Count +1
