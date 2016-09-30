create table Game_User (
    id char(8) primary key,
    pw varchar(16) not null check(LENGTH(pw) >= 8)
);

create table Task (
    name varchar(16) primary key,
    description varchar(64) unique
);

create table Profession (
    name varchar(12) primary key
);

create table Weapon (
    name varchar(32) primary key,
    damage int not null check(damage > 0),
    lvl_req int not null check(lvl_req >= 0),
    accuracy float not null check(accuracy > 0 and accuracy <= 1),
    profession varchar(12) not null,
    item_no char(3),
    description varchar(256),

    foreign key (profession) references Profession
);

create table Armor (
    name varchar(32) primary key,
    defence varchar(32),
    lvl_req int not null check(lvl_req >= 0),
    profession varchar(12),
    item_no char(3),
    description varchar(256),

    foreign key (profession) references Profession
);

create table Item (
    name varchar(32) primary key,
    value int not null check(value >= 0),
    type varchar(6) not null check(type = 'Hp' or type = 'Mp'),
    item_no char(3),
    description varchar(256)
);

create table Game_Char (
    name varchar(32) unique not null,
    user_id char(8) not null,
    hp int not null check(hp > 0),
    maxHp int not null check(maxHp > 0),
    mp int not null check(mp >= 0),
    maxMp int not null check(maxMp >= 0),
    defence int not null check(defence >= 0),
    exp int not null check(exp >= 0),
    lvl int not null check(lvl > 0 and lvl <= 50),
    profession varchar(12) not null,
    weapon varchar(32) not null,
    armor varchar(32) not null,
    money int not null check(money >= 0),

    primary key (name, user_id),
    foreign key (user_id) references Game_User,
    foreign key (profession) references Profession,
    foreign key (weapon) references Weapon,
    foreign key (armor) references Armor
);

create table Needs_To_Complete (
    user_id char(8),
    char_name varchar(32),
    task_name varchar(16),
    deadline timestamp,

    primary key (user_id, char_name, task_name),
    foreign key (user_id) references Game_User,
    foreign key (char_name, user_id) references Game_Char,
    foreign key (task_name) references Task
);

create table Completed_By (
    user_id char(8),
    char_name varchar(32),
    task_name varchar(16),

    primary key (user_id, char_name, task_name),
    foreign key (user_id) references Game_User,
    foreign key (char_name, user_id) references Game_Char,
    foreign key (task_name) references Task
);

create table Skill (
    name varchar(32) primary key,
    damage int not null check(damage >= 0),
    mana_cost int not null check(mana_cost >= 0 and mana_cost <= 100),
    type varchar(6) not null check(type = 'Attack' or type = 'Heal'),
    lvl_req int not null check(lvl_req >= 0),
    profession varchar(12) not null,

    foreign key (profession) references Profession
);

create table Inventory (
    char_name varchar(32),
    item_no char(3),
    amount int,
    type varchar(32),

    foreign key (char_name) references Game_Char
);
