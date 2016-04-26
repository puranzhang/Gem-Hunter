/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package finalproject;

import java.io.*;
import java.sql.*;
import java.util.*;

/**
 * Contains main method that interacts with the database while allowing user to
 * play the game.
 *
 */
public class Game {

    /* Information for accessing database */
    static final String URL = "jdbc:oracle:thin:@abacus1:1525:C325";
    static final String USR = "";
    static final String PWD = "";

    // character instance of the user
    static UserCharacter user_char;

    public static String initializeGame(Connection conn) {
        try {
            Statement stmt = conn.createStatement();
            System.out.println("Are you a new user? Y/N");
            Scanner sc = new Scanner(System.in);
            if (sc.next().toLowerCase().equals("n")) {
                System.out.println("Please enter your userID and password (seperated by space): ");
                // read in id and pw.
                String id = sc.next();
                String pw = sc.next();

                // look up wether id and pw match.
                String check = "select * from GAME_USER where id = '" + id + "' AND pw = '" + pw + "'";
                ResultSet rs = stmt.executeQuery(check);

                // if not match, repeat asking.
                while (!rs.next()) {
                    System.out.println("Your id and password didn't match.");

                    System.out.println("Please re-enter your userID and password (seperated by space): ");
                    id = sc.next();
                    pw = sc.next();
                    check = "select * from Game_User where id = '" + id + "' and pw = '" + pw + "'";
                    rs = stmt.executeQuery(check);
                }
                stmt.close();
                System.out.print("Welcome " + id + ". ");

                return id;
            } else {
                // create new user.
                String id = createUser(conn);

                // create new character.
                createChar(id, conn);

                return id;

            }
        } catch (SQLException e) {
            System.err.println(e);
        }

        return null;
    }

    private static String createUser(Connection conn) {
        try {
            Statement stmt = conn.createStatement();
            Scanner sc = new Scanner(System.in);

            System.out.println("Please create your userID (8 digit number): ");
            String id = sc.next();
            while (id.length() != 8) {
                System.out.println("userID have to be 8 digit! Please re-create your userID: ");
                id = sc.next();
            }

            String check = "select * from Game_User where id = '" + id + "'";
            ResultSet rs = stmt.executeQuery(check);
            while (rs.next()) {
                System.out.println("userID you typed already exists. Please enter another one: ");
                id = sc.next();
                check = "select * from Game_User where id = '" + id + "'";
                rs = stmt.executeQuery(check);
            }

            System.out.println("Please create your password (between 8 to 16 digits): ");
            String pw = sc.next();
            while (pw.length() < 8 || pw.length() > 16) {
                System.out.println("Invalid password length! Please re-create your password (between 8 to 16 digits): ");
                pw = sc.next();
            }
            System.out.println("Your first name: ");
            String firstName = sc.next();
            System.out.println("Your last name: ");
            String lastName = sc.next();
            String name = firstName + " " + lastName;
            System.out.println("Your email: ");
            String email = sc.next();
            while (!email.contains("@")) {
                System.out.println("Invalid email format! Please re-enter your email: ");
                email = sc.next();
            }

            String updateUser = "insert into Game_User " + "values ('" + id + "', '" + pw + "', '" + name + "', '" + email + "')";
            int rows = stmt.executeUpdate(updateUser);

            if (rows == 0) {
                System.err.println("Failed to register new user.");
            } else {
                System.out.println(
                        "Successfully registered user.");
            }

            stmt.close();
            return id;
        } catch (SQLException e) {
            System.err.println(e);
        }
        return null;
    }

    private static void createChar(String id, Connection conn) {
        try {
            Statement stmt = conn.createStatement();
            Scanner sc = new Scanner(System.in);

            System.out.println("Please enter your character name (<= 32 letters): ");
            String charName = sc.next();
            while (charName.length() > 32) {
                System.out.println("Invalid name length! Please re-create your character name (<= 32 letters): ");
            }

            String check = "select * from Game_Char where name = '" + charName + "'";
            ResultSet rs = stmt.executeQuery(check);
            while (rs.next()) {
                System.out.println("The name already exists. Please enter another one: ");
                charName = sc.next();
                check = "select * from Game_Char where name = '" + charName + "'";
                rs = stmt.executeQuery(check);
            }

            // choose profession.
            System.out.println("Please choose one of following professions ('Archer', 'Thief', 'Fighter', 'Magician'): ");
            String prof = sc.next();

            // assign weapons.
            String weapon = "";
            switch (prof) {
                case "Archer":
                    weapon = "Bow";
                    break;
                case "Thief":
                    weapon = "Dagger";
                    break;
                case "Fighter":
                    weapon = "Sword";
                    break;
                case "Magician":
                    weapon = "Wand";
                    break;
            }

            // insert char into DB.
            String updateChar = "insert into Game_Char " + "values ('" + charName + "', '" + id + "', " + 100 + ", " + 100 + ", " + 0 + ", " + 1 + ", '" + prof + "', '" + weapon + "')";
            int rows = stmt.executeUpdate(updateChar);

            if (rows == 0) {
                System.err.println("Failed to create new character.");
            } else {
                System.out.println(
                        "Successfully created character.");
            }

            stmt.close();
        } catch (SQLException e) {
            System.err.println(e);
        }
    }

    private static void initializeCharacter(String userId, Connection conn) {
        try {
            // retrieve user from database
            /**
             * Technically we also need character name to retrieve character *
             * from database, but from current version of the game one user *
             * will have one character. So, this is okay.
             */
            String queryC = "select * from Game_Char where user_id = '" + userId + "'";
            Statement stmtC = conn.createStatement();
            ResultSet rsC = stmtC.executeQuery(queryC);
            rsC.next(); // moves pointer to next
            String cName = rsC.getString("name");
            int hp = rsC.getInt("hp");
            int mp = rsC.getInt("mp");
            int exp = rsC.getInt("exp");
            int lvl = rsC.getInt("lvl");
            String profession = rsC.getString("profession");
            String weapon = rsC.getString("weapon");

            // retrieve weapon from database
            String queryW = "select * from Weapon where name = '" + weapon + "'";
            Statement stmtW = conn.createStatement();
            ResultSet rsW = stmtW.executeQuery(queryW);
            rsW.next();
            int damage = rsW.getInt("damage");
            float accuracy = rsW.getFloat("accuracy");

            Weapon user_weapon = new Weapon(weapon, damage, accuracy);

            Set<Skill> skills = new HashSet();

            String queryS = "select * from Skill where profession = '" + profession + "' and lvl_req <= '" + lvl + "'";
            Statement stmtS = conn.createStatement();
            ResultSet rsS = stmtS.executeQuery(queryS);
            while (rsS.next()) {
                String skill_name = rsS.getString("name");
                int skill_damage = rsS.getInt("damage");
                int mana_cost = rsS.getInt("mana_cost");
                String type = rsS.getString("type");
                int lvl_req = rsS.getInt("lvl_req");

                Skill newSkill = new Skill(skill_name, skill_damage, mana_cost, type, lvl_req);
                skills.add(newSkill);
            }

            user_char = new UserCharacter(cName, hp, mp, lvl, profession, skills, user_weapon);

            System.out.println("You've logged in!");
            System.out.println("---------------------------------");
            System.out.println("Your Character: " + cName);
            System.out.println("Profession: " + profession);
            System.out.println("Character Level: " + lvl);
            System.out.println("Your current health: " + hp);
            System.out.println("Your current mana: " + mp);
            System.out.println("");

            //user_char.printPartial(); // print partial information about user_char
            stmtC.close();
            stmtW.close();
            stmtS.close();
        } catch (SQLException e) {
            System.err.println(e);
        }
    }


    /*
     Is called whenever character levels up. Updates the character in the 
     following ways:
     1. Fully restores hp, mp.
     2. Sets exp to zero.
     3. Acquires new skils if they exist.
     4. Acquires new weapon if it exists.
     */
    private static void updateCharacter(Connection conn) {
        System.out.println("LEVELED UP!! \t " + "Your lvl: " + (user_char.getLVL()+1));
        System.out.println("Your character has been healed!");
        user_char.setHP(100);
        user_char.setMP(100);
        user_char.setEXP(0);
        user_char.setLVL(user_char.getLVL() + 1);
        try {
            String query = "select * from Skill where profession = '" + user_char.getProfession() + "' and lvl_req = '" + user_char.getLVL() + "'";
            Statement stmt = conn.createStatement();
            ResultSet rs = stmt.executeQuery(query);
            while (rs.next()) {
                String skill_name = rs.getString("name");
                int skill_damage = rs.getInt("damage");
                int mana_cost = rs.getInt("mana_cost");
                String type = rs.getString("type");
                int lvl_req = rs.getInt("lvl_req");

                Skill newSkill = new Skill(skill_name, skill_damage, mana_cost, type, lvl_req);
                user_char.addSkill(newSkill);
                System.out.println("Learned new skill: " + skill_name);
            }

            if (user_char.getLVL() % 10 == 0) {
                String queryWeapon = "select * from Weapon where profession = '" + user_char.getProfession() + "' and lvl_req = '" + user_char.getLVL() + "'";
                ResultSet rsW = stmt.executeQuery(queryWeapon);
                while (rsW.next()) {
                    String wName = rsW.getString("name");
                    int wDamage = rsW.getInt("damage");
                    float wA = rsW.getFloat("accuracy");

                    Weapon newWeapon = new Weapon(wName, wDamage, wA);
                    user_char.setWeapon(newWeapon);
                    System.out.println("Acquired new weapon: " + wName);
                }
            }
        } catch (SQLException e) {
            System.err.println(e);
        }
    }

    public static UserCharacter initializeEnemy(int currentLevel, String characterName, Connection conn) {
        try {
            // get the enemy character choices
            String getTheCharacter = "select * from Game_Char where lvl <= " + currentLevel + "+3 and name <> '" + characterName + "'";
            Statement stmt = conn.createStatement();
            ResultSet charChoices = stmt.executeQuery(getTheCharacter);

            //Pick random enemy from the set
            int iter = 0;
            while (charChoices.next()) {
                iter++; //counts the number of enemy choices retrieved
            }

            //Pick enemy at random
            Random gen = new Random();
            charChoices = stmt.executeQuery(getTheCharacter);
            charChoices.next();
            for (int i = 0; i < iter-1; i++) {
                if (gen.nextInt() % 2 == 1) {
                    break;
                }
                charChoices.next();
            }

            // retrive enemy information
            int charLevel = charChoices.getInt("lvl");
            String charName = charChoices.getString("name");
            String charProfession = charChoices.getString("profession");
            String weapName = charChoices.getString("weapon");

            //Retrieve enemy's weapon from database
            String getTheWeapon = "select * from Weapon where name = '" + weapName + "'";
            PreparedStatement fetchWeapon = conn.prepareStatement(getTheWeapon);
            ResultSet weapChoices = fetchWeapon.executeQuery();
            weapChoices.next();

            // create instance of weapon
            int weapDam = weapChoices.getInt("damage");
            double weapAcc = weapChoices.getDouble("accuracy");
            Weapon usedWeapon = new Weapon(weapName, weapDam, weapAcc);

            // Retrieve skills for the character from database
            String getTheSkills = "select * from skill where profession = '" + charProfession
                    + "' and lvl_req <= " + charLevel;
            PreparedStatement fetchSkill = conn.prepareStatement(getTheSkills);
            ResultSet skillRes = fetchSkill.executeQuery();

            Set<Skill> skillSet = new HashSet<Skill>();
            // Create new instance of Skill Set and fill it
            while (skillRes.next()) {
                String skillName = skillRes.getNString("name");
                int skillDam = skillRes.getInt("damage");
                int skillMana = skillRes.getInt("mana_cost");
                String skillType = skillRes.getNString("type");
                int skillLvl = skillRes.getInt("lvl_req");
                String skillProf = skillRes.getNString("profession");

                skillSet.add(new Skill(skillName, skillDam, skillMana, skillType, skillLvl));
            }

            // create new UserCharacter instance and return it.
            UserCharacter enemy = new UserCharacter(charName, charLevel, charProfession, skillSet, usedWeapon);
            return enemy;

        } catch (SQLException e) {
            System.err.println(e);
        }

        return new UserCharacter();
    }

    // uses skill
    private static void handleSkill(UserCharacter attacker, UserCharacter receiver, Skill playersSkill, Weapon playersWeap) {
        if ((playersSkill.getType()).equals("Attack")) { // type is attack
            int damage = (playersWeap.getDamage() + playersSkill.getDamage()) / 2;
            double accuracy = playersWeap.getAccuracy();
            Random rand = new Random();
            
            double temp = rand.nextDouble();
            if (temp <= accuracy) {
                receiver.setHP(receiver.getHP() - damage);
                attacker.setMP(attacker.getMP() - playersSkill.getManaCost());
                
                System.out.println(attacker.getName() + " Hit!");
                System.out.println("damage: " + damage);
                System.out.println(receiver.getName() + "'s hp: " + receiver.getHP());
            } else {
                System.out.println(attacker.getName() + " Missed!");
                System.out.println(receiver.getName() + "'s hp: " + receiver.getHP() );
            }
        } else { // type is heal
            int heal = playersSkill.getDamage();
            if (attacker.getHP() + heal > 100) {
                attacker.setHP(100);
            } else {
                attacker.setHP(attacker.getHP() + heal);
            }
            attacker.setMP(attacker.getMP() - playersSkill.getManaCost());
        }
    }

    // saves information about user_char in database
    private static void save(Connection conn) {
        try {
            String update = "update Game_Char C1 set C1.hp = '" + user_char.getHP() + "', C1.mp = '" + user_char.getMP() + "', C1.exp = '"
                    + user_char.getEXP() + "', C1.lvl = '" + user_char.getLVL() + "', C1.weapon = '"
                    + user_char.getWeapon().getName() + "' where C1.name = '" + user_char.getName() + "'";
            Statement stmt = conn.createStatement();
            int rows = stmt.executeUpdate(update);
            if (rows == 0) {
                System.err.println("Failed to save data.");
            }
        } catch (SQLException e) {
            System.err.println(e);
        }
    }

    /*
     * EXP each level needed = 20*1.1^lvl+100;
     */
    private static void win(Connection conn, UserCharacter enemy_char) {
        System.out.println("You win!!");
        System.out.println("But you will gain nothing except some exp.");
        if (user_char.getHP() > 80) {
            user_char.setHP(100);
        } else {
            user_char.setHP(user_char.getHP() + 20);
        }

        if (user_char.getMP() > 90) {
            user_char.setMP(100);
        } else {
            user_char.setMP(user_char.getMP() + 10);
        }

        if(user_char.getLVL() == 50){
            System.out.println("You've reached the top lvl and cannot gain more experience!");
        } else{
            int expBonus = 0;
            if (enemy_char.getLVL() > user_char.getLVL()) {
                expBonus = (enemy_char.getLVL() - user_char.getLVL()) * enemy_char.getLVL() + 10;
            }
            // Remove later
            expBonus = 200;
            int expUp = (int) Math.pow(1.1, user_char.getLVL()) + 50 + expBonus;
            user_char.setEXP(user_char.getEXP() + expUp);

            int levelNeeded = (int) (20 * Math.pow(1.1, user_char.getLVL()) + 100);
            if (user_char.getEXP() >= levelNeeded) {
                updateCharacter(conn);
            } else {
                System.out.println("Your character gain " + expUp + " experience, and the current exp is: "
                        + user_char.getEXP() + "/" + levelNeeded);
            }
        } 
    }

    private static void lose() {
        user_char.setHP(100);
        user_char.setMP(100);
        user_char.setEXP((int) (user_char.getEXP() * 0.9));
        System.out.println("Lose...");
        System.out.println("You are so not good at this game. Try something else in the world?");
    }

    // chooses skill for enmy by random
    private static Skill chooseEnemySkill(UserCharacter enemy) {
        // retrieve number of skills enemy has
        int numSkills = enemy.getSkills().size();

        // randomly choose number less than numSkills
        Random ran = new Random();
        int chosenIndex = ran.nextInt(numSkills);

        // choose skill according to chosenIndex
        Iterator<Skill> iter = enemy.getSkills().iterator();
        Skill chosenSkill = iter.next();
        for (int i = 0; i < chosenIndex; i++) {
            chosenSkill = iter.next();
        }

        return chosenSkill;
    }

    private static boolean askMorePlay() {
        System.out.println("Would you like to continue playing? Y/N");
        Scanner scan = new Scanner(System.in);
        String response = scan.next();

        while (true) {
            if (response.equals("Y") || response.equals("y")) {
                return true;
            } else if (response.equals("N") || response.equals("n")) {
                return false;
            } else {
                System.out.println("Plesae enter 'Y' or 'N'");
                response = scan.next();
            }
        }

    }


    /*
     Runs the game.
     */
    private static void runGame(Connection conn) {
        System.out.println("Let's start figithing enemies!");
        System.out.println("");
        // runs until user ends game
        boolean isPlaying = true;
        while (isPlaying) {
            // enemy is encountered
            UserCharacter enemy = initializeEnemy(user_char.getLVL(), user_char.getName(), conn);
            System.out.println("Enemy is Encountered!");
            enemy.printPStatus();

            // fight until either user or enemy dies
            while (true) {

                // while loop runs until user types in skill for which user has
                // enogh mana to use.
                int required_mp = Integer.MAX_VALUE;
                boolean hasChosen = false;
                Skill chosenSkill = new Skill();
                System.out.println("Choose the skill you want to use:");
                while (user_char.getMP() < required_mp) {
                    if (hasChosen) {
                        System.out.println("You don't have enough mana! Choose again.");
                    }
                    // print out skills that user can use
                    user_char.printSkills();

                    // receive user's choice of skill to use
                    Scanner scan = new Scanner(System.in);
                    String stringSkill = scan.nextLine().trim().toLowerCase();

                    // find the matching skill instance
                    Set<Skill> userSkills = user_char.getSkills();
                    Iterator<Skill> iter = userSkills.iterator();
                    while (iter.hasNext()) {
                        Skill currentSkill = iter.next();
                        if (currentSkill.getName().toLowerCase().equals(stringSkill)) {
                            chosenSkill = currentSkill;
                            break;
                        }
                    }

                    required_mp = chosenSkill.getManaCost();
                    hasChosen = true;
                }
                System.out.println("");

                // retrieve user's weapon
                Weapon userWeapon = user_char.getWeapon();
                
                // apply the skill on enemy
                handleSkill(user_char, enemy, chosenSkill, userWeapon);
                
                // print out user's hp
                System.out.println(user_char.getName() + "'s hp: " + user_char.getHP());
                System.out.println("---------------------------------");
                
                // enemy died
                if (enemy.getHP() <= 0) {
                    win(conn, enemy); // update character instance when he wins
                    save(conn); // save information about character in database

                    isPlaying = askMorePlay();
                    break; // fight is over
                }
                
                // retrieve enemy's weapon
                Weapon enemyWeapon = enemy.getWeapon();

                // choose skill from enemy by random
                Skill enemySkill = chooseEnemySkill(enemy);
                //** we do not consider enemy's MP when enemy uses skills **//
                
                // apply enemy's skill on user
                handleSkill(enemy, user_char, enemySkill, enemyWeapon);
                
                // print out enemy's hp
                System.out.println(enemy.getName() + "'s hp: " + enemy.getHP());
                System.out.println("");
                
                // user died
                if (user_char.getHP() <= 0) {
                    lose(); // update character instance when he wins
                    save(conn); // save information about character in database

                    isPlaying = askMorePlay();
                    break; // fight is over
                }
            }

        }
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try {
            // Register driver by finding the class that corresponds do it.
            String driverName = "oracle.jdbc.OracleDriver";
            Class.forName(driverName);

            // Create a connection to the DBMS
            Connection conn = DriverManager.getConnection(URL, USR, PWD);
            // If no exception, then we connected successfully
            System.out.println("Connected to C325."); // debugging

            String user_id = initializeGame(conn);
            initializeCharacter(user_id, conn);
            runGame(conn);

        } catch (ClassNotFoundException c) {
            System.err.println("Couldn't find the driver, check CLASSPATH "
                    + "or Netbeans project preferences.");
            System.err.println(c);
        } catch (SQLException e) {
            System.err.println(e);
        }
    }
}
