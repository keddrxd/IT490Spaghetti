import http.client
import json
import mysql.connector
import pika

#RabbitMQ Connection
RABBIT_HOST = '25.80.204.225'
RABBIT_PORT = '5672'
RABBIT_Q = '*'
RABBIT_USER = 'test'
RABBIT_PASS = 'test'
RABBIT_VH = 'testHost'
RABBIT_EX = 'movieExchange'


mydb = mysql.connector.connect(
    host = "localhost",
    user = "admin",
    password = "adminPwd",
    database = "usersDB"
)



credentials = pika.PlainCredentials(RABBIT_HOST,RABBIT_PASS)


conn = http.client.HTTPSConnection("api.themoviedb.org")

payload = "{}"


conn.request("GET", "/3/movie/upcoming?region=US&page=1&language=en-US&api_key=f8b954579281e43ef2cd96c216d57cb2", payload)

res = conn.getresponse()
data = res.read()

#convert to json
rsp_json = json.loads(data.decode("utf-8"))
#print(rsp_json)


def sendMovies(rabbitMQServer, rabbitQueue, rabbitUser, rabbitPass, rabbitVhost, rabbitEX, rabbitPort, movieTitle, releaseDates, genre):

    movieDict = {
        'title':movieTitle,
        'releasedates':releaseDates,
        'genre': genre

    }

    rabbitMQMessage = json.dumps(movieDict , sort_keys=true, ident = 4, default=str)
    connection = pika.BlockingConnection(pika.ConnectionParameters(rabbitMQServer, rabbitPort, rabbitVhost, credentials))
    channel = connection.channel()
    channel.basic_publish(exchange=rabbitEX, routing_key=rabbitQueue,body=rabbitMQMessage)






for i in rsp_json["results"]:
    username = "andypoo"
  
    
    action = 28    
    comedy = 35
    animation = 16
    horror = 27
    romance = 10749
    scifi = 878
    mycursor = mydb.cursor()
    sql1 = "INSERT INTO comedy (comedy, rd) VALUES (%s,%s)"
    sql2 = "INSERT INTO horror (horror, rd) VALUES (%s,%s)"
    sql3 = "INSERT INTO action (action, rd) VALUES (%s,%s)"
    sql4 = "INSERT INTO scifi (scifi, rd) VALUES (%s,%s)"
    sql5 = "INSERT INTO romance (romance, rd) VALUES (%s,%s)"
    sql6 = "INSERT INTO animation (animation, rd) VALUES (%s,%s)"
    
    #print("genre: {}".format(i["genre_ids"]))
    for g in i["genre_ids"]:
        if comedy == g:
            comedyRec = i["title"]
            rd1 = i["release_date"]
            val1 = (comedyRec, rd1)
            mycursor.execute(sql1, val1)
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,comedyRec,rd1,"Comedy")

            print(i["title"]+" - is a comedy movie. It will be released on "+i["release_date"])

        if horror == g:
            horrorRec = i["title"]
            rd2 = i["release_date"]
            val2 = (horrorRec, rd2)
            mycursor.execute(sql2, val2)
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,horrorRec,rd2,"Horror")
            print(i["title"]+" - is a horror movie. It will be released on "+i["release_date"])

        if action == g:
            #i["title"] = actionRec
            actionRec =  i["title"]
            rd3 = i["release_date"]
            val3 = (actionRec, rd3)
            mycursor.execute(sql3, val3)
            #print (actionRec+rd1)
            #print (rd1)
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,actionRec,rd3,"Action")
            print(i["title"]+" - is a action movie. It will be released on "+i["release_date"])

        if scifi == g:
            scifiRec = i["title"]
            rd4 = i["release_date"]
            val4 = (scifiRec, rd4)
            mycursor.execute(sql4, val4)
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,scifi,rd4,"Scifi")
            print(i["title"]+" - is a science fiction movie. It will be released on "+i["release_date"])
        
        if romance == g:
            romanceRec = i["title"]
            rd5 = i["release_date"]
            val5 = (romanceRec, rd5)
            mycursor.execute(sql5, val5)
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,romanceRec,rd5,"Romance")
            print(i["title"]+" - is a romance movie. It will be released on "+i["release_date"])
        
        if animation == g:
            animationRec = i["title"]
            rd6 = i["release_date"]
            val6 = (animationRec, rd6)
            mycursor.execute(sql6, val6)
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,animationRec,rd6,"Animation")
            print(i["title"]+" - is a animation movie. It will be released on "+i["release_date"])
        
        
    mydb.commit()











#print(data.decode("utf-8"))





                
