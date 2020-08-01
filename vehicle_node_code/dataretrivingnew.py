# vehicle two  data retrieving
import time
##time.sleep(120)
#import serial
import requests
#import RPi.GPIO as GPIO
import datetime
from datetime import datetime
import Adafruit_GPIO.SPI as SPI
import Adafruit_SSD1306
from PIL import Image
from PIL import ImageDraw
from PIL import ImageFont
import subprocess

def fnDataFromNetSpillting(Testlist,Index):
    pass
'''''''''''Display Intialize'''''
def fnOLEDDisplayInitailize():
    OLED_Display_Line_1 = ""
    OLED_Display_Line_2 = ""
    OLED_Display_Line_3 = ""
    OLED_Display_Line_4 = ""
    OLED_Display_Line_5 = ""
    OLED_Display_Line_6 = ""
    RST = 0
    disp = Adafruit_SSD1306.SSD1306_128_64(rst=RST)




OLED_Display_Line_1 = "" 
OLED_Display_Line_2 = ""
OLED_Display_Line_3 = ""
OLED_Display_Line_4 = ""
OLED_Display_Line_5 = ""
OLED_Display_Line_6 = ""
RST = 0
disp = Adafruit_SSD1306.SSD1306_128_64(rst=RST)
disp.begin()
disp.clear()
disp.display()

width = disp.width
height = disp.height
image1 = Image.new('1', (width, height))
draw = ImageDraw.Draw(image1)
draw.rectangle((0,0,width,height), outline=0, fill=0)

padding = -2
top = padding
bottom = height-padding
x = 0
font = ImageFont.load_default()


draw.rectangle((0,0,width,height), outline=0, fill=0)

# Write two lines of text.
disp.clear()
disp.display()
draw.text((x, top),       "Welcome SIT Tumkur " ,  font=font, fill=255)
draw.text((x, top+8),     "STEP Vehicle Network", font=font, fill=255)
draw.text((x, top+16),    "Vehicle Status ",  font=font, fill=255)
draw.text((x, top+25),    "Registered vehicle",  font=font, fill=255)
draw.text((x, top+34),    "www.ayash.in",  font=font, fill=255)
draw.text((x, top+43),    "www.ayash.in",  font=font, fill=255)
draw.text((x, top+51),    "Traveling to ",  font=font, fill=255)

# Display image.
disp.image(image1)
disp.display()
''''''''


Data=[]
Ge0_location=[] 
Rain_Value  =[]
X_axis_Value = []
Y_axis_Value = []
Z_axis_Value = []
Traffic_Count=[]


GL1_Avg_Rain_Value  =0
GL1_Avg_X_axis_Value = 0
GL1_Avg_Y_axis_Value = 0
GL1_Avg_Z_axis_Value = 0
GL1_Avg_Traffic_Count= 0
GL1_Vehicle_Count =0

GL2_Avg_Rain_Value  =0
GL2_Avg_X_axis_Value = 0
GL2_Avg_Y_axis_Value = 0
GL2_Avg_Z_axis_Value = 0
GL2_Avg_Traffic_Count= 0
GL2_Vehicle_Count =0

GL3_Avg_Rain_Value  =0
GL3_Avg_X_axis_Value = 0
GL3_Avg_Y_axis_Value = 0
GL3_Avg_Z_axis_Value = 0
GL3_Avg_Traffic_Count= 0
GL3_Vehicle_Count =0


URL1 = "http://ayash.in/testurl/ir.php?z="
URL_Private_Key = "http://ayash.in/testurl/ir.php?z=123456780" 
UserChoise_GL= "GL"
UserChoise_GL += raw_input("Enter desired location :GL")
print("User Travelling to ",UserChoise_GL)
OLED_Display_Line_6 = "Travelling to" +str(UserChoise_GL)

width = disp.width
height = disp.height
image1 = Image.new('1', (width, height))
draw = ImageDraw.Draw(image1)
draw.rectangle((0,0,width,height), outline=0, fill=0)

padding = -2
top = padding
bottom = height-padding
x = 0
font = ImageFont.load_default()


draw.rectangle((0,0,width,height), outline=0, fill=0)

# Write two lines of text.
disp.clear()
disp.display()
draw.text((x, top),       "Welcome SIT Tumkur " ,  font=font, fill=255)
draw.text((x, top+8),     "STEP Vehicle Network", font=font, fill=255)
draw.text((x, top+16),    "Vehicle Status ",  font=font, fill=255)
draw.text((x, top+25),    "Registered vehicle",  font=font, fill=255)
draw.text((x, top+34),    "www.ayash.in",  font=font, fill=255)
draw.text((x, top+43),    "www.ayash.in",  font=font, fill=255)
#draw.text((x, top+51),    "Traveling to ",  font=font, fill=255)
draw.text((x, top+25),    OLED_Display_Line_4,  font=font, fill=255)
draw.text((x, top+34),    "www.ayash.in/Ajith",  font=font, fill=255)
draw.text((x, top+51),    OLED_Display_Line_6,  font=font, fill=255)
# Display image.
disp.image(image1)
disp.display()


disp.image(image1)
disp.display()
print("OLED_Display_Line_6 = ",OLED_Display_Line_6)
time.sleep(10)

while(True):
    vehicle=[]
    Ge0_location=[] 
    Rain_Value  =[]
    X_axis_Value = []
    Y_xis_Value = []
    Z_axis_Value = []
    Traffic_Count=[]
    

    loopCount=0
    GL1_Avg_Rain_Value  =0
    GL1_Avg_X_axis_Value = 0
    GL1_Avg_Y_axis_Value = 0
    GL1_Avg_Z_axis_Value = 0
    GL1_Avg_Traffic_Count= 0
    GL1_Vehicle_Count =0

    GL2_Avg_Rain_Value  =0
    GL2_Avg_X_axis_Value = 0
    GL2_Avg_Y_axis_Value = 0
    GL2_Avg_Z_axis_Value = 0
    GL2_Avg_Traffic_Count= 0
    GL2_Vehicle_Count =0

    GL3_Avg_Rain_Value  =0
    GL3_Avg_X_axis_Value = 0
    GL3_Avg_Y_axis_Value = 0
    GL3_Avg_Z_axis_Value = 0
    GL3_Avg_Traffic_Count= 0
    GL3_Vehicle_Count =0

    
    r1 = requests.get(url = URL_Private_Key)

    WebRespdata1 = r1.text

    print("WebRespdata1 : ",WebRespdata1)
    #print str(WebRespdata1)
    IndivialVehicleDataFromWeb= WebRespdata1.replace("<br>","")
    IndivialVehicleDataFromWeb= IndivialVehicleDataFromWeb.split("~^RIS=")

    print(" IndivialVehicleDataFromWeb[0] :",IndivialVehicleDataFromWeb[0])
    print(" IndivialVehicleDataFromWeb[1] :",IndivialVehicleDataFromWeb[1])

    for i in IndivialVehicleDataFromWeb:
        if i=="":
            pass
        else:
            vehicle.append( str(i[14:18]))
            Ge0_location.append( str(i[19:22]))
            Rain_Value.append( str(i[25:29]))
            X_axis_Value.append( str(i[29:33]))
            Y_axis_Value.append( str(i[33:37]))
            Z_axis_Value.append( str(i[37:41]))
            Traffic_Count.append( str(i[41:45]))

    print(" vehicle : ",str(vehicle))
    print ("Ge0_location : ",str(Ge0_location))
    print ("Rain_Value : ",str(Rain_Value))
    print ("X_axis_Value : ",str(X_axis_Value))
    print ("Y_xis_Value : ",str(Y_axis_Value))
    print ("Z_axis_Value : ",str(Z_axis_Value))
    print ("Traffic_Count : ",str(Traffic_Count))
    time.sleep(2)
    for i in range (0,10):
        if Ge0_location[i]== 'GL1':
            print ("vehicle :", str(vehicle[i]))
            print ("Ge0_location : ",str(Ge0_location[i]))
            print ("Rain_Value : ",str(Rain_Value[i]))
            print ("X_axis_Value : ",str(X_axis_Value[i]))
            print ("Y_xis_Value : ",str(Y_axis_Value[i]))
            print ("Z_axis_Value : ",str(Z_axis_Value[i]))
            print ("Traffic_Count : ",str(Traffic_Count[i]))
            GL1_Vehicle_Count = GL1_Vehicle_Count + 1
            GL1_Avg_Rain_Value  += int(Rain_Value[i])
            GL1_Avg_X_axis_Value += int(X_axis_Value[i])
            GL1_Avg_Y_axis_Value += int(Y_axis_Value[i])
            GL1_Avg_Z_axis_Value += int(Z_axis_Value[i])
            GL1_Avg_Traffic_Count += int(Traffic_Count[i])
        elif Ge0_location[i]== 'GL2':
            print "GL2---"
            print ("Ge0_location : ",str(Ge0_location[i]))
            print ("Rain_Value : ",str(Rain_Value[i]))
            print ("X_axis_Value : ",str(X_axis_Value[i]))
            print ("Y_xis_Value : ",str(Y_axis_Value[i]))
            print ("Z_axis_Value : ",str(Z_axis_Value[i]))
            print ("Traffic_Count : ",str(Traffic_Count[i]))
            GL2_Vehicle_Count = GL2_Vehicle_Count + 1
            GL2_Avg_Rain_Value  += int(Rain_Value[i])
            GL2_Avg_X_axis_Value += int(X_axis_Value[i])
            GL2_Avg_Y_axis_Value += int(Y_axis_Value[i])
            GL2_Avg_Z_axis_Value += int(Z_axis_Value[i])
            GL2_Avg_Traffic_Count += int(Traffic_Count[i])

    if(GL1_Vehicle_Count>=1):
        GL1_Avg_Rain_Value  = GL1_Avg_Rain_Value / GL1_Vehicle_Count
        GL1_Avg_X_axis_Value = GL1_Avg_X_axis_Value /  GL1_Vehicle_Count
        GL1_Avg_Y_axis_Value = GL1_Avg_Y_axis_Value /  GL1_Vehicle_Count 
        GL1_Avg_Z_axis_Value = GL1_Avg_Z_axis_Value /  GL1_Vehicle_Count
        GL1_Avg_Traffic_Count = GL1_Avg_Traffic_Count /  GL1_Vehicle_Count
    else :
        GL1_Avg_Rain_Value  = 0
        GL1_Avg_X_axis_Value = 0
        GL1_Avg_Y_axis_Value = 0
        GL1_Avg_Z_axis_Value = 0
        GL1_Avg_Traffic_Count = 0
        
    print(" GL1 Values \n\r")
    print("GL1_Avg_Rain_Value =",GL1_Avg_Rain_Value)
    print("GL1_Avg_X_axis_Value =",GL1_Avg_X_axis_Value)
    print("GL1_Avg_Y_xis_Value =",GL1_Avg_Y_axis_Value)
    print("GL1_Avg_Z_axis_Value =",GL1_Avg_Z_axis_Value)
    print("GL1_Avg_Traffic_Count =",GL1_Avg_Traffic_Count)

    if(GL2_Vehicle_Count>=1):
        GL2_Avg_Rain_Value  = GL2_Avg_Rain_Value / GL2_Vehicle_Count
        GL2_Avg_X_axis_Value = GL2_Avg_X_axis_Value /  GL2_Vehicle_Count
        GL2_Avg_Y_axis_Value = GL2_Avg_Y_axis_Value /  GL2_Vehicle_Count 
        GL2_Avg_Z_axis_Value = GL2_Avg_Z_axis_Value /  GL2_Vehicle_Count
        GL2_Avg_Traffic_Count = GL2_Avg_Traffic_Count /  GL2_Vehicle_Count
    else :
        GL2_Avg_Rain_Value  = 0
        GL2_Avg_X_axis_Value = 0
        GL2_Avg_Y_axis_Value = 0
        GL2_Avg_Z_axis_Value = 0
        GL2_Avg_Traffic_Count = 0
    print(" GL2 Values \n\r")
    print("GL2_Avg_Rain_Value =",GL2_Avg_Rain_Value)
    print("GL2_Avg_X_axis_Value =",GL2_Avg_X_axis_Value)
    print("GL2_Avg_Y_xis_Value =",GL2_Avg_Y_axis_Value)
    print("GL2_Avg_Z_axis_Value =",GL2_Avg_Z_axis_Value)
    print("GL2_Avg_Traffic_Count =",GL2_Avg_Traffic_Count)

    OLED_Display_Line_1 = "----GL1----"

    OLED_Display_Line_2 = "Rain="+str(GL1_Avg_Rain_Value)
    OLED_Display_Line_3 = "Road="+str(GL1_Avg_X_axis_Value)
    OLED_Display_Line_4 = "Traffic="+str(GL1_Avg_Traffic_Count)
   # OLED_Display_Line_4 = "GL1_V_Count="+str(GL1_Vehicle_Count)
    print("OLED_Display_Line_1 =",OLED_Display_Line_1)
    print("OLED_Display_Line_2 =",OLED_Display_Line_2)
    print("OLED_Display_Line_3 =",OLED_Display_Line_3)
    print("OLED_Display_Line_4 =",OLED_Display_Line_4)
    time.sleep(5)

    if((GL1_Avg_Traffic_Count<80) and (GL1_Avg_Traffic_Count>1)):
        OLED_Display_Line_4 = "Traffic="+str(GL1_Avg_Traffic_Count) + " low"
    elif((GL1_Avg_Traffic_Count<200)and (GL1_Avg_Traffic_Count>1)):
        OLED_Display_Line_4 = "Traffic="+str(GL1_Avg_Traffic_Count) + " Medium"
    elif((GL1_Avg_Traffic_Count>200)):
        OLED_Display_Line_4 = "Traffic="+str(GL1_Avg_Traffic_Count) + " HIGH"
	
    if((GL1_Avg_Rain_Value<400) and (GL1_Avg_Rain_Value>9)):
        OLED_Display_Line_2 = "Rain="+str(GL1_Avg_Rain_Value) + " Heavy"
    elif(GL1_Avg_Rain_Value<800):
        OLED_Display_Line_2 = "Rain="+str(GL1_Avg_Rain_Value) + " Medium"
    else:
        OLED_Display_Line_2 = "Rain="+str(GL1_Avg_Rain_Value) + " No rain"
    
    if((GL1_Avg_X_axis_Value>450) and (GL1_Avg_X_axis_Value<550)):
        OLED_Display_Line_3 = "Road="+str(GL1_Avg_X_axis_Value) + " No Accident"
        #OLED_Display_Line_2 = "GL1_Road="+str(GL1_Avg_X_axis_Value) + " No Accident"
    else:
        OLED_Display_Line_3 = "Road="+str(GL1_Avg_X_axis_Value) + " Accident"

    
    width = disp.width
    height = disp.height
    image1 = Image.new('1', (width, height))
    draw = ImageDraw.Draw(image1)
    draw.rectangle((0,0,width,height), outline=0, fill=0)
    padding = -2
    top = padding
    bottom = height-padding
    x = 0
    font = ImageFont.load_default()
    draw.rectangle((0,0,width,height), outline=0, fill=0)
    disp.clear()
    disp.display()
    draw.text((x, top),       OLED_Display_Line_1,  font=font, fill=255)
    draw.text((x, top+8),     OLED_Display_Line_2, font=font, fill=255)
    draw.text((x, top+16),    OLED_Display_Line_3,  font=font, fill=255)
    draw.text((x, top+25),    OLED_Display_Line_4,  font=font, fill=255)
    draw.text((x, top+34),    "www.ayash.in",  font=font, fill=255)
    disp.image(image1)
    disp.display()
    time.sleep(10)

    OLED_Display_Line_1 = "---GL2--"
    OLED_Display_Line_2 = "Rain="+str(GL2_Avg_Rain_Value)
    OLED_Display_Line_2 = "Road="+str(GL2_Avg_X_axis_Value)
    OLED_Display_Line_4 = "Traffic="+str(GL2_Avg_Traffic_Count)
 #   OLED_Display_Line_4 = "V_Count="+str(GL2_Vehicle_Count)
    '''gl2 display '''
    if((GL2_Avg_Traffic_Count<80) and (GL2_Avg_Traffic_Count>1)):
        OLED_Display_Line_4 = "Traffic="+ str(GL2_Avg_Traffic_Count) + " low"
    elif((GL2_Avg_Traffic_Count<200)and (GL2_Avg_Traffic_Count>1)):
        OLED_Display_Line_4 = "Traffic=" +str(GL2_Avg_Traffic_Count) + " Medium"
    elif((GL2_Avg_Traffic_Count>200)):
        OLED_Display_Line_4 = "Traffic="+ str(GL2_Avg_Traffic_Count) + " HIGH"
	
    if((GL2_Avg_Rain_Value<400) and (GL2_Avg_Rain_Value>9)):
        OLED_Display_Line_2 = "Rain="+str(GL2_Avg_Rain_Value) + " Heavy"
    elif(GL2_Avg_Rain_Value<800):
        OLED_Display_Line_2 = "Rain="+str(GL2_Avg_Rain_Value) + " Medium"
    else:
        OLED_Display_Line_2 = "Rain="+str(GL2_Avg_Rain_Value) + " No rain"

    if((GL2_Avg_X_axis_Value>450) and (GL2_Avg_X_axis_Value<550)):
        OLED_Display_Line_3 = "Road ="+str(GL2_Avg_X_axis_Value) + " No Accident"
    else:
        OLED_Display_Line_3 = "Road ="+str(GL2_Avg_X_axis_Value) + " Accident"


    width = disp.width
    height = disp.height
    image1 = Image.new('1', (width, height))
    draw = ImageDraw.Draw(image1)
    draw.rectangle((0,0,width,height), outline=0, fill=0)
    padding = -2
    top = padding
    bottom = height-padding
    x = 0
    font = ImageFont.load_default()
    draw.rectangle((0,0,width,height), outline=0, fill=0)
    disp.clear()
    disp.display()
    draw.text((x, top),       OLED_Display_Line_1,  font=font, fill=255)
    draw.text((x, top+8),     OLED_Display_Line_2, font=font, fill=255)
    draw.text((x, top+16),    OLED_Display_Line_3,  font=font, fill=255)
    draw.text((x, top+25),    OLED_Display_Line_4,  font=font, fill=255)
    draw.text((x, top+34),    "www.ayash.in/testurl",  font=font, fill=255)
    disp.image(image1)
    disp.display()
    time.sleep(10)

    
    time.sleep(10)
    print(" loop" )

##for i in range (0,10):
##    Ge0_location.append(IndivialVehicleDataFromWeb[i][19:21])
##    print("Ge0_location  ",Ge0_location[i])
##
##Rain_Value.append(IndivialVehicleDataFromWeb[i])
##X_axis_Value.append(IndivialVehicleDataFromWeb[i])
##Y_xis_Value.append(IndivialVehicleDataFromWeb[i])
##Z_axis_Value.append(IndivialVehicleDataFromWeb[i])
##Traffic_Count.append(IndivialVehicleDataFromWeb[i])
##
##*210320195812V00001GL1KEY0000053500000000000077.126113.3269
##
##print("\n splited data ")
##for i in range (0,11):
##    print(IndivialVehicleDataFromWeb[i] ,i)


    
##print("\n area num")
##for i in range (0,9):
##    print(IndivialVehicleDataFromWeb[i])
###for j in range (0,9):
##   # for k in range (28,31):
##        #print str(WebRespdata1[k])
##AreaKey =[x[13:15] for x in IndivialVehicleDataFromWeb]
##
##Time=[x[2:13] for x in IndivialVehicleDataFromWeb]
##Vechile =[x[16:22] for x in IndivialVehicleDataFromWeb]
##
##RainValue =[x[28:32] for x in IndivialVehicleDataFromWeb]
##Xacc=[x[32:36] for x in IndivialVehicleDataFromWeb]
##Yacc=[x[36:40] for x in IndivialVehicleDataFromWeb]
##Zacc=[x[40:44] for x in IndivialVehicleDataFromWeb]
##Zacc=[x[44:48] for x in IndivialVehicleDataFromWeb]
##print ("AreaKey = ",AreaKey)
##print (" axis = ",Xacc,Yacc,Yacc)
##cnt=0
##Sum=0
##for i in range (0,11):
##    if AreaKey[i]== 'GL1':
##        Sum=Sum+int(RainValue[i] )#print(Time[i] ,Vechile[i] , AreaKey[i] , RainValue[i] ,Xacc[i], Yacc[i] , Zacc[i])
##        cnt=cnt+1
##if((Sum/cnt) >=700):
##    print('raining ' , (Sum/cnt))
##    print('sum =',Sum,'count =',cnt)
##    
##else :
##    print("no rain")
##    print('sum =',Sum,'count =',cnt)
##
##
##
