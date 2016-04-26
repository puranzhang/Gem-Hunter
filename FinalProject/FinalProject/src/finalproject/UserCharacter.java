/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package finalproject;

import java.util.*;

/**
 * Represents character in the game. There will be one instance of UserCharacter
 * used by the user. But, there will also be multiple instances of UserCharacter
 * pre-loaded by the developers.
 *
 */
public class UserCharacter {

    private String name;
    private int hp; // max. 100
    private int mp; // max. 100
    private int exp; // max. 100
    private int lvl; // max. 50. Once user hits 50, he can still play the game
    // but cannot level up anymore.
    private String profession; // profession of character
    private Set<Skill> skills; // the skills that the character could use
    private Weapon weapon;
    private Set<Task> tasks; // set of tasks that user needs to complete.
    // NOT USED IN THE CURRENT VERSION OF THE GAME

    public UserCharacter() {

    }

    public UserCharacter(String iniName, String iniProfession) {
        name = iniName;
        hp = 100;
        mp = 100;
        exp = 0;
        lvl = 1;
        profession = iniProfession;
    }

    public UserCharacter(String inName, int level, String inProfession, Set<Skill> inSkills, Weapon inWeapon) {
        name = inName;
        hp = 100;
        mp = 100;
        exp = 0;
        lvl = level;

        profession = inProfession;
        skills = inSkills;
        weapon = inWeapon;

    }

    public UserCharacter(String inName, int inHp, int inMp, int level, String inProfession, Set<Skill> inSkills, Weapon inWeapon) {
        name = inName;
        hp = inHp;
        mp = inMp;
        exp = 0;
        lvl = level;

        profession = inProfession;
        skills = inSkills;
        weapon = inWeapon;

    }

    public String getName() {
        return name;
    }
    
    public int getEXP() {
        return exp;
    }

    public int getHP() {
        return hp;
    }

    public int getMP() {
        return mp;
    }

    public int getLVL() {
        return lvl;
    }

    public String getProfession() {
        return profession;
    }

    public Weapon getWeapon() {
        return weapon;
    }

    public Set<Skill> getSkills() {
        return skills;
    }

    public void setHP(int inHP) {
        hp = inHP;
    }

    public void setMP(int inMP) {
        mp = inMP;
    }

    public void setEXP(int newEXP) {
        exp = newEXP;
    }

    public void setLVL(int newLVL) {
        lvl = newLVL;
    }

    public void addSkill(Skill newSkill) {
        skills.add(newSkill);
    }

    public void setWeapon(Weapon newWeapon) {
        weapon = newWeapon;
    }

    // prints partial status
    public void printPStatus() {
        System.out.println("Chracter name: " + this.name);
        System.out.println("Profession: " + this.profession);
        System.out.println("Level: " + this.lvl);
        System.out.println("HP: " + this.hp);
        System.out.println("MP: " + this.mp);
        System.out.println("");
    }

    // prints full status
    public void printFStatus() {
        System.out.println("Chracter name: " + this.name);
        System.out.println("Profession: " + this.profession);
        System.out.println("Weapon: " + this.weapon.getName());
        System.out.println("Level: " + this.lvl);
        System.out.println("Experience: " + this.exp);
        System.out.println("HP: " + this.hp);
        System.out.println("MP: " + this.mp);

        System.out.print("Skills: ");
        for (Skill temp : skills) {
            System.out.print(temp.getName() + "	");
        }
        System.out.println("");
        System.out.println("");

        //System.out.println("Tasks: ");
    }

    public void printSkills() {
        for (Skill temp : skills) {
            System.out.println(temp.getName() + " - damage: " + temp.getDamage() + " - mp cost: " + temp.getManaCost());
        }
        System.out.println("");
    }

    public void printHpMp() {
        System.out.println("HP: " + this.hp);
        System.out.println("MP: " + this.mp);
        System.out.println("");
    }

}
