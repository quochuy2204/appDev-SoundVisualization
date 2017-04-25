# README
# Github source:
----------------------------------------------
	Acoustic Sensor using RPI3
--------------------------------------------------

Table of Content
1. Configuration Instructions
2. Operating Instructions
3. List of project files
4. Contact information
5. Credits and acknowledgment


1. Configuration Instructions

This section contains 2 parts: hardware configuration and software configuration.

1.1Hardware congihuration

This project is built on a Raspberry Pi3, with a USB sound card and a microphone.

Ethernet connection is recommended. If and older version of Rpberry Pi3 is used, certain change might be necessary.

1.2 Software configurations

First you have to set USB sound card as default audio device:
Boot up Rasberry Pi and aplly the USB sound card
RPi onboard sound card doesn't have microphone interface. We have to change the default audio device to be USB sound card
Use "lusb" command to check if your USB sound card is mouted
Run "sudo nano /etc/asound.conf" command and put following content to the file. "pcm.!default { type plug slave { pcm "hw:1,0" } } ctl.!default { type hw card 1 }"
Go back home directory. Run "nano .asoundrc" and put the same content to the file
Run "alsamixer" to see that USB sound card is the default audio device. You can adjust the volume of mic and headphone


Second you need to downgrade the alsa-utils from 1.0.28 to 1.0.25. To do so,we need to do all steps:
Use "sudo nano /etc/apt/sources.list" command and add : "deb http://mirrordirector.raspbian.org/raspbian/ wheezy main contrib non-free rpi"
Run "sudo apt-get update"
Run "sudo aptitude versions alsa-utils" to check if version 1.0.25 of alsa-util is availble
Run "sudo apt-get install alsa-utils=1.0.25-4" to downgrade
Reboot
Run “arecord -r44100 -c1 -f S16_LE -d5 test.wav” to test that your microphone is working. You should see a “test.wav” file in the current folder
Put earphone on. Run “aplay test.wav” to check that your recording is okay

2. Operating Instructions
Run "make" to make file
Run "./wave.a" and record your sound if you want
Go to "http://www.cc.puv.fi/~e1601142/sound.log" too see the data

3. List of project files
README.md	: this file
makefile	: the makefile of this project
wave.c		: the module containing functions about wave processing
wave.h		: the header of wave.c
screen.c	: the module containing functions about screen manupulation
screen.h	: the header of screen.c
comm.c		: the communication module using libcurl
comm.h 	: the header file of comm.c
main.c		: contains main() function
raspsound.php	: the server page to receive data


4. Contact information
Nguyen Quoc Huy
+358 4695 18812
quochuy2204@outlook.com

5. Credits and acknowledgment
This project uses Raspberry Pi 3.
