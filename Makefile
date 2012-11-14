# Please install the following components before you RUN this makefile:
# $sudo npm install -g less uglify-js jshint recess
VERSION = v100
LIB_DIR = ./assets/lib
DECK_EXT_DIR = ${LIB_DIR}/extensions
JS_DIR = ./assets/scripts
TOOLS_DIR = ./build/tools
FILE_TPL_DIR = ./build/templates
DATE=$(shell date +%I:%M%p)
CHECK=✔
HR=\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#

#
# 压缩 JS 文件
#
js:
	@echo "\n${HR}"
	@echo "\033[32mCompressing Javascript files...\033[39m"
	@echo "${HR}\n"
	@rm -f ${JS_DIR}/*.min.v*.js
	@echo "Removing legacy javascript...             ${CHECK} Done"
	@uglifyjs -nc ${LIB_DIR}/jquery.js > ${JS_DIR}/jquery.min.${VERSION}.js
	@echo "Minifying jquery.js...       ${CHECK} Done"
	@uglifyjs -nc ${LIB_DIR}/modernizr.custom.js > ${JS_DIR}/modernizr.custom.min.${VERSION}.js
	@echo "Minifying modernizr.custom.js...       ${CHECK} Done"
	@cat ${LIB_DIR}/core/deck.core.js ${DECK_EXT_DIR}/hash/deck.hash.js ${DECK_EXT_DIR}/menu/deck.menu.js \
	${DECK_EXT_DIR}/goto/deck.goto.js ${DECK_EXT_DIR}/status/deck.status.js \
	${DECK_EXT_DIR}/navigation/deck.navigation.js ${DECK_EXT_DIR}/scale/deck.scale.js > ${JS_DIR}/italk.tmp.js
	@uglifyjs -nc ${JS_DIR}/italk.tmp.js > ${JS_DIR}/italk.min.${VERSION}.js
	@rm ${JS_DIR}/italk.tmp.js
	@echo "Resolving dependencies and minifying the core...       ${CHECK} Done"
	@echo "\n${HR}"
	@echo "\033[32mJavascript files successfully concatenated and minified at ${DATE}.\033[39m"
	@echo "${HR}\n"
