public class game {
	public static initializeGame(Statement stmt) {
		try {
	        Statement stmt = conn.createStatement();
	        Scanner sc = new Scanner();

			System.out.println("Are you a new user? Y/N");

			if (sc.next() == "N") {
				System.out.println("Please enter your userID and password (seperate by space): ");
				// read in id and pw.
				String id = sc.next();
				String pw = sc.next();

				// look up wether id and pw match.
				String check = "if exists (select 1 from Game_User where id = '" + id + "' and pw = '" + pw + "')";
				ResultSet rs = stmt.excuteQuery(check);
				// if not match, repeat asking.
				while(!rs.next()) {
					System.out.println("Your id and password didn't match.");

					System.out.println("Please enter your userID and password (seperate by space): ");
					id = sc.next();
					pw = sc.next();
					rs = stmt.excuteQuery(check);
        		} 
        		System.out.println("Welcome " + id);

        		// load character
        		initializeCharacter(id, conn);

			} else {
				// create new user.
				String id = createUser(stmt);
                
                // create new character.
                createChar(id);


			}
	        stmt.close();
	    } catch (SQLException e) {
	        System.err.println(e);
	    }
	}

	private static String createUser(Statement stmt) {
		try {
	        Statement stmt = conn.createStatement();
	        Scanner sc = new Scanner();

	        System.out.println("Please create your userID (12 digit number): ");
			String id = sc.next();
			String check = "if exists (select 1 from Game_User where id = '" + id + "')";
			ResultSet rs = stmt.excuteQuery(check);
			while(rs.next()) {
				System.out.println("Your id already exists. Please enter another one: ");
				id = sc.next();
				rs = stmt.excuteQuery(check);
    		} 

    		System.out.println("password (between 8 to 16 digits): ");
    		String pw = sc.next();
    		System.out.println("Your name (first name): ");
    		String name = sc.next();
    		System.out.println("Your email: ");
    		String email = sc.next();

    		String updateUser = "insert into Game_User " + "values ('" + id + "', '" + pw + "', '" + name + "', '" + email + "')";
    		int rows = stmt.executeUpdate(updateUser);
          
            if (rows == 0){
                System.err.println("DEBUG: Failed to insert new user.");
            } else {
                System.out.println(
                    "DEBUG: Successfully inserted user.");
            }

            stmt.close();
            return id;
	    } catch (SQLException e) {
	        System.err.println(e);
	    }
	}

	private static createChar(String id, Statement stmt) {
		try {
	        Statement stmt = conn.createStatement();
	        Scanner sc = new Scanner();

	        System.out.println("Please create your character name (<= 16 letters): ");
            String charName = sc.next();
            String check = "if exists (select 1 from Game_Char where name = '" + charName + "')";
			ResultSet rs = stmt.excuteQuery(check);
			while(rs.next()) {
				System.out.println("The name already exists. Please enter another one: ");
				charName = sc.next();
				rs = stmt.excuteQuery(check);
    		} 
			
			// choose professions.
			System.out.println("Please choose one of following professions ('Archer', 'Thief', 'Fighter', 'Magician'): ");
			String prof = sc.next();

			// assign weapons.
			String weapon;
			switch (prof) {
				case "Archer": 
					weapon = ;
					break;
				case "Thief": 
					weapon = ;
					break;
				case "Fighter": 
					weapon = ;
					break;
				case "Magician": 
					weapon = ;
					break;
			}

			// insert char into DB.
			String updateChar = "insert into Game_Char " + "values ('" + charName + "', '" + id + "', " + 100 + ", " + 100 + ", " + 0 + ", " + 1 + ", '" + prof + "', '" + weapon + "')";
    		int rows = stmt.executeUpdate(updateUser);
          
            if (rows == 0){
                System.err.println("DEBUG: Failed to insert new user.");
            } else {
                System.out.println(
                    "DEBUG: Successfully inserted user.");
            }

            stmt.close();
	    } catch (SQLException e) {
	        System.err.println(e);
	    }
	}

}