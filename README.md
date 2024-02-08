## For admin Login
- Email: admin@gamil.com
- Password: 123456

## API
- For Get Info url-> game.php?toke=
- For Get Info url-> generate_result.php?toke=

Here, token = copied token from dashboad 

**Example**
```bash
token = eyJhbGdvIjoiSFMyNTYiLCJ0eXBlIjoiSldUIn0=.eyJpZCI6IjIiLCJjdXN0b21lcl9pZCI6IkItMzQ0NSIsImN1c3RvbWVyX25hbWUiOiJSYWhhdHVsIHJhYmJpIn0=.NmFjOWY3ZjQwYjIyZGNkZWFjNzNiMjE0MzQzNjkzYTIyYTYyYTUxZmMyODM4ZWI4MjI0OGM4YjZiOTY1MjVkOA==                                
```

## Features

#### API
- For Getting Wheel Items -> wheelitem.php 
Response - all wheel items which are in active status, return as json array. 
{ 1=>{ name: McLaren GR, details:..multiplier:...},
2=>{ name: McLaren GR, details:...},
}

- For Get Info url-> game.php?toke= (6-8 char) … print customer name, id, if result exist , result item id, image, color code, details.  

- For Get Info url-> generate_result.php?toke= (6-8 char)



## Admin Panel 

- Wheel Item - Edit/(Deactive/Reactive) button
- Edit - Name, image (image upload), details (text area), percentage, color code,  multiplier (default - 1) 
- Deactivate - deactivate items will not appear at whellitem.php api, nor at generate_result.php api
- Reactivate - Reactive the deactivated item
- Links - Add Bulk button
- Upload CSV file
- Check if the csv structure is ok or not. 
- Show the added links 



## Project Screenshot

|   |   |
|:---:|:---:|
|Home|Wheel Hems|
|![Home](https://github.com/learnwithfair/game-project/blob/main/screenshot/home.png)|![Hems](https://github.com/learnwithfair/game-project/blob/main/screenshot/wheel-hems.png)| 
|Links|Bulk|
|![Links](https://github.com/learnwithfair/game-project/blob/main/screenshot/links.png)| ![Bulk](https://github.com/learnwithfair/game-project/blob/main/screenshot/add-bulk.png)|


