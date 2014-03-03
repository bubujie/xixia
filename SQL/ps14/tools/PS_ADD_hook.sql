-- 参考：http://www.prestashop.com/forums/topic/218291-create-custom-and-new-hook-in-ps-15/
INSERT INTO `ps_hook` (`id_hook`, `name`, `title`, `description`, `position`, `live_edit`) VALUES
-- (NULL, 'displayRightColumn', 'Right column blocks', '', 1, 1),
-- (NULL, 'displayLeftColumn', 'Left column blocks', '', 1, 1),
(NULL, 'displayBheadTop', 'Bhead-Top', '页眉主区域之前', 1, 1),
(NULL, 'displayBheadBtm', 'Bhead-Btm', '页眉主区域之后', 1, 1),
(NULL, 'displayBbodyTop', 'Bbody-Top', '主区域之前', 1, 1),
(NULL, 'displayMainTop',  'Main-Top',  '主体之前', 1, 1),
(NULL, 'displayComSide',  'Com-Side',  '组件主侧边', 1, 1),
(NULL, 'displayComTop',   'Com-Top',  '组件之前', 1, 1),
(NULL, 'displayComBtm',   'Com-Btm', '组件之后', 1, 1),
(NULL, 'displayComAside', 'Com-Aside', '组件副侧边', 1, 1),
(NULL, 'displayMainBtm',  'Main-Btm',  '主体之后', 1, 1),
(NULL, 'displayBbodyBtm', 'Bbody-Btm', '主区域之后', 1, 1),
(NULL, 'displayBfootTop', 'Bfoot-Top', '页脚主区域之前', 1, 1),
(NULL, 'displayBfootBtm', 'Bfoot-Btm', '页脚主区域之后', 1, 1);

UPDATE `ps_hook_module`
SET id_hook = (SELECT id_hook FROM `ps_hook` WHERE name='displayBheadBtm' LIMIT 1)
WHERE id_module = (SELECT id_module FROM `ps_module` WHERE name='blocktopmenu' LIMIT 1) LIMIT 1;



-- ！！！注意：PrestaShop 1.4没有`ps_hook_alias`表
-- INSERT INTO `ps_hook_alias` (`id_hook_alias`, `alias`, `name`) VALUES
-- (NULL, 'rightColumn', 'displayRightColumn'),
-- (NULL, 'leftColumn', 'displayLeftColumn'),
-- (NULL, 'bheadTop', 'displayBheadTop'),
-- (NULL, 'bheadBtm', 'displayBheadBtm'),
-- (NULL, 'bbodyTop', 'displayBbodyTop'),
-- (NULL, 'mainTop',  'displayMainTop'),
-- (NULL, 'comSide',  'displayComSide'),
-- (NULL, 'comTop',   'displayComTop'),
-- (NULL, 'comBtm',   'displayComBtm'),
-- (NULL, 'comAside', 'displayComAside'),
-- (NULL, 'mainBtm',  'displayMainBtm'),
-- (NULL, 'bbodyBtm', 'displayBbodyBtm'),
-- (NULL, 'bfootTop', 'displayBfootTop'),
-- (NULL, 'bfootBtm', 'displayBfootBtm');
