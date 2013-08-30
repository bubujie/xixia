@echo off&setlocal enabledelayedexpansion

dir F:\htdocs\prestashop_1.4.7.0\prestashop\modules /b /s /O:N /A:D > prestashop_mod_list.txt
for /f "delims=" %%a in ('findstr ".*block" prestashop_mod_list.txt') do (
 set "str=%%a"&set "str=!str:\prestashop_1.4.7.0\=\prestashop_new1470\!"
 echo %%a
 echo !str:\tmpl\=\!
 xcopy %%a !str:\tmpl=\! /E /I /EXCLUDE:prestashop_uncopy.txt
)

pause>nul