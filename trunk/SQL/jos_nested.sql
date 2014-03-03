UPDATE jos_category SET rgt = rgt + 2 
WHERE rgt > (SELECT rgt 
             FROM nested_category
             WHERE name = 'TELEVISIONS');



UPDATE jos_category SET lft = lft + 2 
WHERE lft > (SELECT rgt 
             FROM nested_category
             WHERE name = 'TELEVISIONS');