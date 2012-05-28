USE astronomy;

INSERT INTO constellations
(
name)
VALUES (
'Leo'
);
select LAST_INSERT_ID() into @leo_id;


INSERT INTO constellations
(
name)
VALUES (
'Lyra'
);
select LAST_INSERT_ID() into @lyra_id;

INSERT INTO constellations
(
name)
VALUES (
'Ursa Minor'
);
select LAST_INSERT_ID() into @ursaminor_id;


INSERT INTO skyobjects
(name,
url,
raHrs,
raMin,
raSec,
decSign,
decDeg,
decMin,
decSec)
VALUES (
'Vega',
'http://en.wikipedia.org/wiki/Vega',
'18',
'36',
'56.33635',
'1.0',
'38',
'47',
'1.282'
);

select LAST_INSERT_ID() into @vega_id;


INSERT INTO skyobject_membership
(
skyobjects_id,
constellations_id,
)
VALUES (
@vega_id,
@lyra_id
);

INSERT INTO skyobjects
(name,
raHrs,
raMin,
raSec,
decSign,
decDeg,
decMin,
decSec)
VALUES (
'Kochab',
'14',
'50',
'42.32580',
'1.0',
'74',
'09',
'19.8142'
);

select LAST_INSERT_ID() into @kochab_id;

INSERT INTO skyobject_membership
(
skyobjects_id,
constellations_id,
)
VALUES (
@kochab_id,
@ursaminor_id
);

INSERT INTO skyobjects
(name,
raHrs,
raMin,
raSec,
decSign,
decDeg,
decMin,
decSec)
VALUES (
'Denebola',
'11',
'49',
'3.57834',
'1.0',
'14.0',
'34',
'19.4090'
);

select LAST_INSERT_ID() into @denebola_id;


INSERT INTO skyobject_membership
(
skyobjects_id,
constellations_id,
)
VALUES (
@denebola_id,
@leo_id
);


INSERT INTO skyobjects
(name,
raHrs,
raMin,
raSec,
decSign,
decDeg,
decMin,
decSec)
VALUES (
'Messier 105',
'10',
'47',
'49.6',
'1.0',
'12.0',
'34.0',
'54.0'
);

select LAST_INSERT_ID() into @messier105_id;

INSERT INTO skyobject_membership
(
skyobjects_id,
constellations_id,
)
VALUES (
@messier105_id,
@leo_id
);
