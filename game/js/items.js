var item1 = {
	name: "Item1",
	img: "images/items/item1.png",
	itemType: 'weapon',
	cost: 100
};

var sword1 = {
	name: "Iron Sword",
	img: "images/items/sword1.png",
	itemType: 'weapon',
	itemDescription: "Basic Word",
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
	img: "images/items/sword2.png",
	itemType: 'weapon',
	itemDescription: "Rare Sword",
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
	img: "images/items/sword3.png",
	itemType: 'weapon',
	itemDescription: "Epic Sword",
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
	img: "images/items/wand1.png",
	itemType: 'weapon',
	itemDescription: "Basic Wand",
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
	img: "images/items/wand2.png",
	itemType: 'weapon',
	itemDescription: "Rare Wand",
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
	img: "images/items/wand3.png",
	itemType: 'weapon',
	itemDescription: "Epic Wand",
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
	img: "images/items/armor1.png",
	itemType: 'outfit',
	itemDescription: "Basic Armor",
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
	img: "images/items/armor2.png",
	itemType: 'outfit',
	itemDescription: "Rare Armor",
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
	img: "images/items/armor3.png",
	itemType: 'outfit',
	itemDescription: "Epic Armor",
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
	img: "images/items/cloak1.png",
	itemType: 'outfit',
	itemDescription: "Basic Cloak",
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
	img: "images/items/cloak2.png",
	itemType: 'outfit',
	itemDescription: "Rare Cloak",
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
	img: "images/items/cloak3.png",
	itemType: 'outfit',
	itemDescription: "Epic Cloak",
	cost: 4000,
	ad: 25,
	ap: 0,
	hp: 400,
	mp: 0,
	cdr: 5,
	ms: 1
};

var hp_potion1 = {
	img: "images/items/hp_pot1.png",
	itemType: 'elixir',
	statType: 'hp',
	itemDescription: "Health Elixir",
	cost: 50,
	amount: 300,
	duration: 5000
};

var mp_potion1 = {
	img: "images/items/mp_pot1.png",
	itemType: 'elixir',
	statType: 'mp',
	itemDescription: "Mana Elixir",
	cost: 50,
	amount: 300,
	duration: 5000
};

var ad_potion1 = {
	img: "images/items/ad_pot1.png",
	itemType: 'elixir',
	statType: 'ad',
	itemDescription: "Atack Elixir",
	cost: 50,
	amount: 300,
	duration: 15000
};

var ap_potion1 = {
	img: "images/items/ap_pot1.png",
	itemType: 'elixir',
	statType: 'ap',
	itemDescription: "Magic Elixir",
	cost: 50,
	amount: 300,
	duration: 15000
};

var ad_skill_1 = {
	img: "images/items/ad_skill_1.png",
	itemType: 'skill1',
	skillEffect: ad_skill_1_effect,
	itemDescription: "Slash Atack",
	cost: 200,
	mp_cost: 50,
	cd: 1000
};

var ap_skill_1 = {
	img: "images/items/ap_skill_1.png",
	itemType: 'skill1',
	skillEffect: ap_skill_1_effect,
	itemDescription: "Fireball",
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
