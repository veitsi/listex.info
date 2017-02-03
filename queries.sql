SELECT DISTINCT GoodToCatId FROM Lst_GoodsToCat LIMIT 10;
select * from goods left outer join gtc on goods.GoodId=gtc.GoodId  limit 30;

select count(*) from g
left join t
on g.GoodId=t.GoodId
where t.GoodId is null

select * from c
left join t on c.CatId=t.CatId
where t.GoodId is null
limit 20