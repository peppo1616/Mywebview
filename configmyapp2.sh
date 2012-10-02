#!/bin/bash
#usage ./configmyapp.sh appname site tmp_dir 

#working directories
#you have to put application source dir in the same dir of this script
#mydir is cwd and SOURCE is the android source dir

#########################CONFIG#########################

MYDIR="/home/mywebview/"
SOURCE="MyWebView"
DOWNLOAD_DIR="download_dir/"
DEST="tmp_dir/app"${3}"/"
DEST_="tmp_dir/app_"${3}"/"

#java config
#you need to change your path to java dir to point javac
#this may vary from system to system, because there are
#several version of java-jdk on linux

#PATH may point to the android sdk tools

JAVA_HOME=/usr/lib/jvm/java-6-sun/
export JAVA_HOME
PATH=$PATH:$JAVA_HOME/bin
export PATH
PATH=$PATH:/home/mywebview/android-sdk-linux/tools/
export PATH

#input
NAME=${1}
URL=${2}

#output
APK_PATH="bin/MyWebViewActivity-debug.apk"

#java package for android app
PACKAGE="src/it/mywebview/customers/main"

########################/CONFIG#########################

#making an istance for this customization
cp -rf ${MYDIR}${SOURCE} ${MYDIR}${DEST}

# for custom package name
mv ${MYDIR}${DEST}${PACKAGE} ${MYDIR}${DEST}"src/it/mywebview/customers/app_${3}"
find ${MYDIR}${DEST} -name "*.xml" -o -name "*.java" -o -name "*.cfg" | xargs sed -ri 's/customers.main/customers.app_'${3}'/g'

rm ${MYDIR}${DEST}"assets/config.txt"
rm ${MYDIR}${DEST}"res/values/application_name.xml"

#write custom data
echo -e '<?xml version="1.0" encoding="utf-8"?>\n<resources>\n<string name="app_name">'${NAME}'</string>\n</resources>' > ${MYDIR}${DEST}"res/values/application_name.xml"
echo "URL = "${URL}";" >> ${MYDIR}${DEST}"assets/config.txt"


#compile project
android update project --target android-15 --path ${MYDIR}${DEST}

ant debug -buildfile ${MYDIR}${DEST}"build.xml"
cp ${MYDIR}${DEST}${APK_PATH} ${MYDIR}${DEST}
if cp ${MYDIR}${DEST}${APK_PATH} ${MYDIR}${DOWNLOAD_DIR}"MyWebView_"${3}".apk"; then
	rm -rf ${MYDIR}${DEST}
	echo "finish"
else	echo "error"
	exit 1
fi

