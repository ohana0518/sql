

SELECT * FROM bookstore.product WHERE pName LIKE '%理論與實務%';

SELECT pName,unitPrice FROM bookstore.product WHERE unitPrice>300;

SELECT product.pName , author.name FROM bookstore.product,bookstore.author WHERE catalog='CD' AND product.pNo=author.pNo;

SELECT transMid FROM bookstore.transaction UNION all SELECT pName FROM bookstore.product;

SELECT tNo,transMid FROM bookstore.transaction WHERE method='cart' and  (transTime BETWEEN '2004-01-01 00:00:00' AND '2004-12-31 23:59:59');

INSERT  INTO bookstore.product  VALUES ('b10000', 'Python機器學習', 500, 'Book');
INSERT  INTO bookstore.author  VALUES ('b10000', 'Raschka') ;

UPDATE bookstore.product SET unitPrice='600' WHERE pName='Python機器學習';	

DELETE FROM bookstore.browse WHERE mID='c0927777' AND pNo='d11222' AND browseTime='2003-10-10 21:30:30';

SELECT pNo, pName FROM bookstore.product WHERE pNo NOT IN (SELECT pNo FROM bookstore.order);

SELECT mId, name FROM bookstore.members WHERE mId IN 
(SELECT transMid FROM bookstore.product, bookstore.browse, bookstore.transaction 
WHERE pName= 'OLAP進階' AND product.pNo = browse.pNo AND browse.mId = transaction.transMid);




