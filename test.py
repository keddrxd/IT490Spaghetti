import http.client
import json
import mysql.connector

mydb = mysql.connector.connect(
    host = "localhost",
    user = "admin",
    password = "adminPwd",
    database = "usersDB"
)








conn = http.client.HTTPSConnection("api.themoviedb.org")

payload = "{}"


conn.request("GET", "/3/movie/upcoming?region=US&page=1&language=en-US&api_key=f8b954579281e43ef2cd96c216d57cb2", payload)

res = conn.getresponse()
data = res.read()

#convert to json
rsp_json = json.loads(data.decode("utf-8"))
#print(rsp_json)



for i in rsp_json["results"]:

    actionRec = ""
    rd1 = ""
    
    action = 28    
    comedy = 35
    animation = 16
    horror = 27
    romance = 10749
    scifi = 878
    
    #print("genre: {}".format(i["genre_ids"]))
    for g in i["genre_ids"]:
        if action == g:
            #i["title"] = actionRec
            actionRec =  i["title"]
            rd1 = i["release_date"]
            print (actionRec+rd1)
            #print (rd1)
            #print(i["title"]+" - is a action movie. It will be released on "+i["release_date"])
        if comedy == g:
            print(i["title"]+" - is a comedy movie. It will be released on "+i["release_date"])
        if animation == g:
            print(i["title"]+" - is a animation movie. It will be released on "+i["release_date"])
        if horror == g:
            print(i["title"]+" - is a horror movie. It will be released on "+i["release_date"])
        if romance == g:
            print(i["title"]+" - is a romance movie. It will be released on "+i["release_date"])
        if scifi == g:
            print(i["title"]+" - is a science fiction movie. It will be released on "+i["release_date"])

#print(data.decode("utf-8"))

mycursor = mydb.cursor()
sql = "INSERT INTO movieRec (username, comedy, rd1, horror, rd2, action, rd3, scifi, rd4, romance, rd5, animation, rd6) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
val = (actionRec, rd1)
mycursor.execute(sql, val)
mydb.commit()
                
