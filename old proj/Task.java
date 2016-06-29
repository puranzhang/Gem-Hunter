/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package finalproject;
//Connection 
/**
 *
 * @author kl4jf
 */
public class Task {
    private String taskName;
    private String taskDescrip;
    private boolean completed;
    
    
    public Task(String name, String desc) {
        taskName = name;
        taskDescrip = desc;
        completed = false;
    }
    
    public String getName() {
        return taskName;
    }
    
    public String getDescrip() {
        return taskDescrip;
    }
    
    public void setName(String newName) {
        taskName = newName;
    }
    
    public void setDescrip(String newDescrip) {
        taskDescrip = newDescrip;
    }
    
    public void taskComplete() {
        completed = true;
    }
    
    public boolean taskStatus() {
        return completed;
    }
}
