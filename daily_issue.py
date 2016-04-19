#!/usr/bin/python
import datetime
import smtplib
import urllib


server = smtplib.SMTP('SERVER')
username = 'USERNAME'
password = 'PASSWORD'

today = datetime.date.today()
date_str = today.strftime("%%B %d, %%Y" % today.day)

message = """From: Daily Gazette <dailygazette@swarthmore.edu>
To: thedailygazette@sccs.swarthmore.edu
MIME-Version: 1.0
Content-type: text/html
Subject: The Daily Gazette - %s
""" % (date_str)

#f = urllib.urlopen("http://live-daily-gazette.pantheon.io/sendout/")
f = urllib.urlopen("http://www.daily.swarthmore.edu/sendout/")
s = f.read()
f.close()

for line in s:
	message += line

from_ad = "FROM_EMAIL@email.com"
to_ad = "TO_EMAIL@email.com"

server.starttls()
server.login(username,password)
server.sendmail(from_ad, to_ad, message)
server.quit()
