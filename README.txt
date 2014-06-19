Welcome to Princess Pi's Magical Changeling!
The Changeling is a network security drop box with a pretty pink pony web interface!
He is ultra configurable and capable of testing wifi security in a few easy steps!

Built on RaspberryPi, KaliPi, and the LAMP stack, The Changeling packs powerful tools not for the feint of heart!

Best, most current instructions exist at:
www.princesspiresearch.com/changeling.html
<a href="http://www.princesspiresearch.com/changeling.html">Princess Pi's Changeling</a>

Update 06052014.9

You will need:

A Raspberry Pi Model B
A MicroUSB Charger (if you don't have one)
A compatable SD card
An Alfa card (any will do)
A powered USB hub
Huawei 3G modem
Kali Pi Image
Linux: Nothing
Windows: Win32DiskImager
Changeling Scripts
Start by installing the KaliPi image on an SD card.

Linux: CHANGE /dev/sdb to your SD Card Location

dd bs=4M if=kaliimage.img of=/dev/sdb
Windows: Use win32DiskImager

Now plug keyboard, mouse, wifi card, and 3G modem into the USB ports and powered hub. Install SD card and plug in ethernet cable. Plus in HDMI cable. Plug in micro usb charger.

KaliPi should now boot. Login with username root and password toor Run:

#passwd
#apt-get update
#apt-get upgrade
#apt-get install tasksel
Select web server and mail server

Install PHP5 and modules

#apt-get install php5 php-pear php5-suhosin php5-mysql libapache2-mod-php5 
#service apache2 restart
Update sudoers file to allow www-data to run commands as root

#visudo
www-data 	ALL=(ALL:ALL) NOPASSWD: ALL
Install wifite and cowpie

#apt-get install wifite cowpie

3g goes in /root
princesspi goes in /var/www
princesspi/* gets chmodded to 777 (chmod -r 777 princesspi)