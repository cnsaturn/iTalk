# Please install the following components before you RUN this makefile:
# $sudo npm install -g less uglify-js jshint recess
VERSION = v100
LIB_DIR = ./public/assets/scripts/lib
TOOLS_DIR = ./build/tools
FILE_TPL_DIR = ./build/templates
DATE=$(shell date +%I:%M%p)
CHECK=\033[32m✔\033[39m
HR=\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#

#
# CONCATENATE AND MINIFY JS
#
js:
	@echo "\n${HR}"
	@echo "\033[32mCompressing Javascript files...\033[39m"
	@echo "${HR}\n"
	@make version
	@rm -f ${JS_DIR}/*.min.v*.js
	@echo "Removing legacy javascript...             ${CHECK} Done"
	@uglifyjs -nc ${JS_LIB_DIR}/jquery.js > ${JS_DIR}/jquery.min.${VERSION}.js
	@echo "Minifying jquery.js to ${JS_DIR}/jquery.min.${VERSION}.js...       ${CHECK} Done"
	@uglifyjs -nc ${JS_LIB_DIR}/html5.js > ${JS_DIR}/html5.min.${VERSION}.js
	@echo "Minifying html5.js to ${JS_DIR}/html5.min.${VERSION}.js...       ${CHECK} Done"
	@cat ${JS_LIB_DIR}/jquery.placeholder.js ${JS_LIB_DIR}/juicer.js ${JS_LIB_DIR}/bootstrap-dropdown.js ${JS_LIB_DIR}/bootstrap-tooltip.js ${JS_LIB_DIR}/bootstrap-popover.js ${JS_LIB_DIR}/jquery.cookie.js ${JS_LIB_DIR}/jquery.fancybox.js ${JS_LIB_DIR}/jquery.fancybox-thumbs.js ${JS_LIB_DIR}/jquery.printpage.js ${JS_LIB_DIR}/jquery.highlight.js ${JS_DIR}/yoozi.app.js > ${JS_DIR}/yoozi.app.tmp.js
	@uglifyjs -nc ${JS_DIR}/yoozi.app.tmp.js > ${JS_DIR}/yoozi.app.min.${VERSION}.js
	@rm ${JS_DIR}/yoozi.app.tmp.js
	@echo "Resolving dependencies and minifying the core to yoozi.app.min.${VERSION}.js...       ${CHECK} Done"
	@cat ${JS_LIB_DIR}/jquery.livequery.js ${JS_LIB_DIR}/jquery.ve.js ${JS_LIB_DIR}/bootstrap-datepicker.js ${JS_LIB_DIR}/jquery.elastic.js ${JS_LIB_DIR}/jquery.geocomplete.js ${JS_LIB_DIR}/swfupload.js ${JS_LIB_DIR}/swfupload.queue.js ${JS_LIB_DIR}/jquery.chosen.js ${JS_DIR}/yoozi.app.posting.js > ${JS_DIR}/yoozi.app.posting.tmp.js
	@uglifyjs -nc ${JS_DIR}/yoozi.app.posting.tmp.js > ${JS_DIR}/yoozi.app.posting.min.${VERSION}.js
	@rm ${JS_DIR}/yoozi.app.posting.tmp.js
	@echo "Resolving dependencies and minifying the core to yoozi.app.posting.min.${VERSION}.js...       ${CHECK} Done"
	@rm -f ${JS_DIR}/jquery.ve.zh-*.v*.js
	@uglifyjs -nc  ${JS_LIB_DIR}/jquery.ve.zh-cn.js > ${JS_DIR}/jquery.ve.zh-cn.${VERSION}.js
	@uglifyjs -nc  ${JS_LIB_DIR}/jquery.ve.zh-sg.js > ${JS_DIR}/jquery.ve.zh-sg.${VERSION}.js
	@uglifyjs -nc  ${JS_LIB_DIR}/jquery.ve.zh-hk.js > ${JS_DIR}/jquery.ve.zh-hk.${VERSION}.js
	@uglifyjs -nc  ${JS_LIB_DIR}/jquery.ve.zh-tw.js > ${JS_DIR}/jquery.ve.zh-tw.${VERSION}.js
	@echo "\n${HR}"
	@echo "\033[32mJavascript files successfully concatenated and minified at ${DATE}.\033[39m"
	@echo "${HR}\n"

#
# CONCATENATE AND MINIFY CSS
#
css:
	@echo "\n${HR}"
	@echo "\033[32mCompressing CSS files...\033[39m"
	@echo "${HR}\n"
	@make version
	@rm -f ${CSS_DIR}/*.min.v*.css
	@echo "Removing legacy CSS files...             ${CHECK} Done"
	@cat ${CSS_DIR}/bootstrap.css ${CSS_DIR}/bootstrap-responsive.css ${CSS_DIR}/font-awesome.css ${CSS_DIR}/classad.css > ${CSS_DIR}/classad.tmp.css
	@java -jar ${TOOLS_DIR}/yuicompressor-2.4.7.jar --charset utf-8 ${CSS_DIR}/classad.tmp.css -o ${CSS_DIR}/classad.min.${VERSION}.css
	@rm ${CSS_DIR}/classad.tmp.css
	@echo "Resolving dependencies and minifying minifying the core to ${CSS_DIR}/classad.min.${VERSION}.css...       ${CHECK} Done"
	@java -jar ${TOOLS_DIR}/yuicompressor-2.4.7.jar --charset utf-8 ${CSS_DIR}/ie7.css -o ${CSS_DIR}/ie7.min.${VERSION}.css
	@echo "Minifying ie7.css to ${CSS_DIR}/ie7.min.${VERSION}.css...       ${CHECK} Done"
	@cat ${CSS_DIR}/chosen.css ${CSS_DIR}/classad.posting.css > ${CSS_DIR}/classad.posting.tmp.css
	@java -jar ${TOOLS_DIR}/yuicompressor-2.4.7.jar --charset utf-8 ${CSS_DIR}/classad.posting.tmp.css -o ${CSS_DIR}/classad.posting.min.${VERSION}.css
	@rm ${CSS_DIR}/classad.posting.tmp.css
	@echo "Minifying classad.posting.css to ${CSS_DIR}/classad.posting.min.${VERSION}.css...       ${CHECK} Done"
	@echo "\n${HR}"
	@echo "\033[32mCSS files successfully concatenated and minified at ${DATE}.\033[39m"
	@echo "${HR}\n"

#
# Bump assets version 
#
version:
	@sed -e s/'@VERSION@'/'${VERSION}'/g ${FILE_TPL_DIR}/assets.php > ${APP_ROOT_DIR}/classad/config/assets.php
	@echo "Bumping assets to version ${VERSION}...       ${CHECK} Done"
#
# Code lines count
#
stat:
	@echo "\n${HR}"
	@echo "\033[32mCount the source code for version ${VERSION}...\033[39m"
	@echo "${HR}\n"
	@${TOOLS_DIR}/cloc.pl . --report-file=${STATS_DIR}/classad.${VERSION}.xml --xml

#
# Minify SCRIPTS
#
minify:
	make js
	make css
	make stat