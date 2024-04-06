
INSERT INTO dog_data(name,breed,year,month,day,weight,email,note,image,indate)VALUES(:name,:breed,:year,:month,:day,:weight,:email,:note,:image, sysdate());
-- ↑この一行を、insert.phpの$sql=にそのまま入れる

SELECT * FROM dog_data;　
-- 全部のデータをとってくる
SELECT id,name,indate FROM gs_an_table;
-- id,name,indateのみとってくる
SELECT * FROM gs_an_table WHERE id>=1 AND id<=3;
-- 1-3までのidをとってくる
SELECT * FROM gs_an_table WHERE email LIKE '%test1%';
-- test1とメールアドレスに入っているものをとってくる
SELECT * FROM gs_an_table ORDER BY indate DESC;
-- DESCは降順　昇順はASC
SELECT * FROM gs_an_table ORDER BY indate DESC LIMIT 3;
-- 最新の３つだけ取り出してくる