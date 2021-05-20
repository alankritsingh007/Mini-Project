import speech_recognition as sr
import smtplib
from gtts import gTTS 
import os
from playsound import playsound

print ("-"*60)
print ("Mini Project: Voice based Email for Visually Impaired")
print ("-"*60)


tts = gTTS(text="Speak Now", lang='en',slow=False)
ttsname=("sn.mp3") 
tts.save(ttsname)


tts = gTTS(text="Mini Project: Voice based Email for Visually Impaired", lang='en',slow=False)
ttsname=("a.mp3") 
tts.save(ttsname)
playsound("a.mp3")
os.remove(ttsname)

login = os.getlogin
print ("You are logging from : "+login())


recognizer=sr.Recognizer()
dict={'attherate':'@','underscore':'_','dot':'.','comma':',','hyphen':'-'}
fromaddr = 'alankritsingh5@gmail.com'
password= '9936486895'
username=fromaddr
address = "Please Enter receiver's mail address"
language = 'en'
voicemsg = gTTS(text=address, lang=language, slow=False)
voicemsg.save("ad.mp3")
os.system("mpg321 ad.mp3")
playsound("ad.mp3")
with sr.Microphone() as source:
    print('Clearing background noise..')
    recognizer.adjust_for_ambient_noise(source,duration=2)
    print("Enter Receiver's  mail id:- ")
    toaddrs=recognizer.listen(source)
    print("Receiver's  mail recorded")
try:
    print('Printing the mail address..')
    text2=recognizer.recognize_google(toaddrs,language='en-US')
    text2 = text2.lower()
    text2=text2.replace(" ","")
    print("Receiver's mail is:{}".format(text2))
except Exception as ex:
    print(ex)
for key, value in dict.items():
    text2 = text2.replace(key, value)   
print("Receiver's correct mail is:-",text2)
toaddrs=text2
with sr.Microphone() as source:
    print('Clearing background noise..')
    recognizer.adjust_for_ambient_noise(source,duration=1)
    print("waiting for your message...")
    recordedaudio=recognizer.listen(source)
    print('Done recording..!')
try:
    print('Printing the message..')
    text=recognizer.recognize_google(recordedaudio,language='en-US')

    print('Your message:{}'.format(text))

except Exception as ex:
    print(ex)
server = smtplib.SMTP('smtp.gmail.com', 587)
server.ehlo()
server.starttls()
server.login(username, password)
mytext = text
language = 'en'
voicemsg = gTTS(text=mytext, lang=language, slow=False)
voicemsg.save("a.mp3")
os.system("mpg321 a.mp3")
playsound("a.mp3")
mytext2 = "Do you want to confirm the message and send it!!"
language = 'en'
voicemsg = gTTS(text=mytext2, lang=language, slow=False)
voicemsg.save("o.mp3")
os.system("mpg321 o.mp3")
playsound("o.mp3")
with sr.Microphone() as source:
    print('Clearing background noise..')
    recognizer.adjust_for_ambient_noise(source,duration=1)
    print("waiting for your confirmation msg...")
    recordedaudio=recognizer.listen(source)
    print('Done recording..!')
try:
    print('Printing the message..') 
    response=recognizer.recognize_google(recordedaudio,language='en-US')
    print('Your message:{}'.format(response))
except Exception as ex:
    print(ex)
if(response=='yes'or response=='YES'):
    server.sendmail(fromaddr, toaddrs, text)  
    print ("Congrates! Your mail has send. ")
    tts = gTTS(text="Congrates! Your mail has send. ", lang='en')
    ttsname=("send.mp3") 
    tts.save(ttsname)
    playsound("send.mp3")
server.quit()

