:: 必须以管理员身份运行
DIR D:\xixia\PKG\j25\pkg_faqs /B /S /O:N /A:-D >  D:\xixia\pkg_faqs_update_list.txt
CD /D "C:\Program Files\7-Zip"
DEL D:\xixia\pkg_faqs.zip
7z.exe a D:\xixia\pkg_faqs.zip E:\xixia\PKG\j25\pkg_faqs\
7z.exe u D:\xixia\pkg_faqs.zip D:\xixia\PKG\j25\pkg_faqs\  -r
7z.exe d D:\xixia\pkg_faqs.zip *.bak -r
pause
