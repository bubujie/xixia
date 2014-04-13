:: 必须以管理员身份运行
DIR D:\xixia\PKG\j25\pkg_faqs /B /S /O:N /A:-D >  D:\xixia\pkg_faqs_update_list.txt
CD /D C:\Program Files\7-Zip
DEL D:\xixia\com_faqs.zip
7z.exe a D:\xixia\com_faqs.zip E:\xixia\PKG\j25\pkg_faqs\com_faqs\*
7z.exe u D:\xixia\com_faqs.zip D:\xixia\PKG\j25\pkg_faqs\com_faqs\* -r
7z.exe d D:\xixia\com_faqs.zip *.bak -r
pause
