# Please install the following components before you RUN this makefile:
# $sudo npm install -g less uglify-js jshint recess
VERSION = v100
ENVIRONMENT = production
APP_DIR = ./application
LIB_DIR = ./assets/lib
DECK_EXT_DIR = ${LIB_DIR}/extensions
JS_DIR = ./assets/scripts
CSS_DIR = ./assets/styles
TOOLS_DIR = ./build/tools
FILE_TPL_DIR = ./build/templates
DATE=$(shell date +%I:%M%p)
CHECK=✔
HR=\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#

#
# 压缩合并 JS 文件
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

#
# 压缩合并 CSS （需要 Java 环境支持）
#
css:
	@echo "\n${HR}"
	@echo "\033[32mCompressing CSS files...\033[39m"
	@echo "${HR}\n"
	@rm -f ${CSS_DIR}/*.min.v*.css
	@echo "Removing legacy CSS files...             ${CHECK} Done"
	@cat ${LIB_DIR}/font-awesome.css ${LIB_DIR}/core/deck.core.css ${DECK_EXT_DIR}/goto/deck.goto.css \
	${DECK_EXT_DIR}/menu/deck.menu.css ${DECK_EXT_DIR}/navigation/deck.navigation.css \
	${DECK_EXT_DIR}/status/deck.status.css ${DECK_EXT_DIR}/goto/deck.goto.css \
	${DECK_EXT_DIR}/hash/deck.hash.css ${DECK_EXT_DIR}/scale/deck.scale.css \
	${LIB_DIR}/themes/style/swiss.css ${LIB_DIR}/themes/transition/horizontal-slide.css \
	${LIB_DIR}/italk.css > ${CSS_DIR}/italk.tmp.css
	@java -jar ${TOOLS_DIR}/yuicompressor-2.4.7.jar --charset utf-8 ${CSS_DIR}/italk.tmp.css -o ${CSS_DIR}/italk.min.${VERSION}.css
	@rm ${CSS_DIR}/italk.tmp.css
	@echo "Resolving dependencies and minifying the core css...       ${CHECK} Done"
	@echo "\n${HR}"
	@echo "\033[32mCSS files successfully concatenated and minified at ${DATE}.\033[39m"
	@echo "${HR}\n"

#
# 更新 assets.config 文件中的版本号
#
version:
	@echo "\n${HR}"
	@echo "\033[32mBumping version...\033[39m"
	@echo "${HR}\n"
	@sed -e s/'@VERSION@'/'${VERSION}'/g ${FILE_TPL_DIR}/assets.php > ${APP_DIR}/config/assets.php
	@echo "Bumping assets to version ${VERSION}...       ${CHECK} Done"
	@sed -e s/'@ENVIRONMENT@'/'${ENVIRONMENT}'/g ${FILE_TPL_DIR}/index.php > ./index.php
	@echo "Set environment to *${ENVIRONMENT}* for the application...             ${CHECK} Done"
	@echo "\n${HR}"
	@echo "\033[32mSet current version to ${VERSION} at ${DATE}.\033[39m"
	@echo "${HR}\n"

deploy:
	make version
	make js
	make css
	# 自定义：调用执行其他脚本，如重置系统缓存、重启服务器、发送邮件通知管理员等
	#make more