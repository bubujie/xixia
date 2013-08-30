@echo off&setlocal enabledelayedexpansion

dir F:\htdocs\Joomla_2.5.0-Stable-Full_Package\components /b /s /O:N /A:D > joomla_com_list.txt
for /f "delims=" %%a in ('findstr "views.*tmpl" joomla_com_list.txt') do (
 set "str=%%a"&set "str=!str:\Joomla_2.5.0-Stable-Full_Package\=\joomla_new250\!"
 set "str=!str:\views\=\!"
 echo %%a
 echo !str:\tmpl\=\!
 xcopy %%a !str:\tmpl=\! /E /I /EXCLUDE:joomla_uncopy.txt
)

dir F:\htdocs\Joomla_2.5.0-Stable-Full_Package\modules /b /s /O:N /A:D > joomla_mod_list.txt
for /f "delims=" %%a in ('findstr ".*tmpl" joomla_mod_list.txt') do (
 set "str=%%a"&set "str=!str:\Joomla_2.5.0-Stable-Full_Package\=\joomla_new250\!"
 echo %%a
 echo !str:\tmpl\=\!
 xcopy %%a !str:\tmpl=\! /E /I /EXCLUDE:joomla_uncopy.txt
)

pause>nul