SELECT count(*) from Lst_Goods
LEFT JOIN Lst_GoodsToCat
on Lst_Goods.GoodId=Lst_GoodsToCat.GoodId
where Lst_GoodsToCat.GoodId is null;

SELECT Name FROM Lst_Cat
LEFT JOIN Lst_GoodsToCat ON Lst_Cat.CatId=Lst_GoodsToCat.CatId
WHERE Lst_GoodsToCat.GoodId is null;