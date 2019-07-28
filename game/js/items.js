var item1 = {
	name: "Item1",
	img: "/opss/game/images/items/item1.png",
	itemType: 'weapon',
	cost: 100
};

var sword1 = {
	name: "Iron Sword",
	img: "/opss/game/images/items/sword1.png",
	itemType: 'weapon',
	itemDescription: "test1",
	cost: 100,
	ad: 10,
	ap: 0,
	hp: 0,
	mp: 0,
	cdr: 0,
	ms: 2
};

var sword2 = {
	name: "Frozen Blade",
	img: "/opss/game/images/items/sword2.png",
	itemType: 'weapon',
	itemDescription: "test2",
	cost: 500,
	ad: 15,
	ap: 0,
	hp: 0,
	mp: 0,
	cdr: 0,
	ms: 3
};

var sword3 = {
	name: "Cutlass of King Dice",
	img: "/opss/game/images/items/sword3.png",
	itemType: 'weapon',
	itemDescription: "test3",
	cost: 2000,
	ad: 25,
	ap: 0,
	hp: 0,
	mp: 0,
	cdr: 5,
	ms: 1
};

var wand1 = {
	name: "Iron Wand",
	img: "/opss/game/images/items/wand1.png",
	itemType: 'weapon',
	itemDescription: "wand1 des",
	cost: 100,
	ad: 0,
	ap: 10,
	hp: 0,
	mp: 0,
	cdr: 2,
	ms: 0
};

var wand2 = {
	name: "Frozen Wand",
	img: "/opss/game/images/items/wand2.png",
	itemType: 'weapon',
	itemDescription: "wand 2 test2",
	cost: 500,
	ad: 5,
	ap: 15,
	hp: 0,
	mp: 0,
	cdr: 3,
	ms: 0
};

var wand3 = {
	name: "Wand of King Dice",
	img: "/opss/game/images/items/wand3.png",
	itemType: 'weapon',
	itemDescription: "test3 wand3",
	cost: 2000,
	ad: 10,
	ap: 50,
	hp: 0,
	mp: 0,
	cdr: 15,
	ms: 3
};

var armor1 = {
	name: "Iron Armor",
	img: "/opss/game/images/items/armor1.png",
	itemType: 'outfit',
	itemDescription: "test1 armor",
	cost: 200,
	ad: 10,
	ap: 0,
	hp: 100,
	mp: 0,
	cdr: 0,
	ms: 2
};

var armor2 = {
	name: "Frozen Armor",
	img: "/opss/game/images/items/armor2.png",
	itemType: 'outfit',
	itemDescription: "test2 armor",
	cost: 1000,
	ad: 15,
	ap: 0,
	hp: 200,
	mp: 0,
	cdr: 0,
	ms: 3
};

var armor3 = {
	name: "Armor of King Dice",
	img: "/opss/game/images/items/armor3.png",
	itemType: 'outfit',
	itemDescription: "armor test3",
	cost: 4000,
	ad: 25,
	ap: 0,
	hp: 2000,
	mp: 0,
	cdr: 5,
	ms: 1
};

var cloak1 = {
	name: "Iron Cloak",
	img: "/opss/game/images/items/cloak1.png",
	itemType: 'outfit',
	itemDescription: "cloak test1",
	cost: 100,
	ad: 10,
	ap: 0,
	hp: 100,
	mp: 0,
	cdr: 0,
	ms: 2
};

var cloak2 = {
	name: "Frozen Cloak",
	img: "/opss/game/images/items/cloak2.png",
	itemType: 'outfit',
	itemDescription: "cloak test2",
	cost: 1000,
	ad: 15,
	ap: 0,
	hp: 100,
	mp: 0,
	cdr: 0,
	ms: 3
};

var cloak3 = {
	name: "Cloak of King Dice",
	img: "/opss/game/images/items/cloak3.png",
	itemType: 'outfit',
	itemDescription: "cloak test3",
	cost: 4000,
	ad: 25,
	ap: 0,
	hp: 400,
	mp: 0,
	cdr: 5,
	ms: 1
};

var hp_potion1 = {
	img: "/opss/game/images/items/hp_pot1.png",
	itemType: 'elixir',
	statType: 'hp',
	itemDescription: "test1 elixir hp",
	cost: 50,
	amount: 300,
	duration: 5000
};

var mp_potion1 = {
	img: "/opss/game/images/items/mp_pot1.png",
	itemType: 'elixir',
	statType: 'mp',
	itemDescription: "test1 elixir mp",
	cost: 50,
	amount: 300,
	duration: 5000
};

var ad_potion1 = {
	img: "/opss/game/images/items/ad_pot1.png",
	itemType: 'elixir',
	statType: 'ad',
	itemDescription: "test1 elixir ad",
	cost: 50,
	amount: 300,
	duration: 15000
};

var ap_potion1 = {
	img: "/opss/game/images/items/ap_pot1.png",
	itemType: 'elixir',
	statType: 'ap',
	itemDescription: "test1 elixir ap",
	cost: 50,
	amount: 300,
	duration: 15000
};

var ad_skill_1 = {
	img: "/opss/game/images/items/ad_skill_1.png",
	itemType: 'skill1',
	skillEffect: ad_skill_1_effect,
	itemDescription: "test1 skill ad",
	cost: 200,
	mp_cost: 50,
	cd: 1000
};

var ap_skill_1 = {
	img: "/opss/game/images/items/ap_skill_1.png",
	itemType: 'skill1',
	skillEffect: ap_skill_1_effect,
	itemDescription: "test1 skill ap",
	cost: 200,
	mp_cost: 50,
	cd: 1000
};

var items = {
  'item1': item1,
	'sword1': sword1,
	'sword2': sword2,
	'sword3': sword3,
	'wand1': wand1,
	'wand2': wand2,
	'wand3': wand3,
	'armor1': armor1,
	'armor2': armor2,
	'armor3': armor3,
	'cloak1': cloak1,
	'cloak2': cloak2,
	'cloak3': cloak3,
	'hp_potion1': hp_potion1,
	'mp_potion1': mp_potion1,
	'ad_potion1': ad_potion1,
	'ap_potion1': ap_potion1,
	'ad_skill_1': ad_skill_1,
	'ap_skill_1': ap_skill_1
}
