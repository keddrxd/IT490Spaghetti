import http.client
import json
import pika

#RabbitMQ Connection
RABBIT_HOST = '192.168.1.10'
RABBIT_PORT = '5672'
RABBIT_Q = '*'
RABBIT_USER = 'test'
RABBIT_PASS = 'test'
RABBIT_VH = 'testHost'
RABBIT_EX = 'movieExchange'



#api
#API Call for Movies
conn = http.client.HTTPSConnection("api.themoviedb.org")
payload = "{}"
conn.request("GET", "/3/movie/upcoming?region=US&page=2&language=en-US&api_key=f8b954579281e43ef2cd96c216d57cb2", payload)
res = conn.getresponse()
data = res.read()

#convert to json
rsp_json = json.loads(data.decode("utf-8"))
#print(rsp_json)

#Send Movies to RabbitMQ Server
def sendMovies(rabbitMQServer, rabbitQueue, rabbitUser, rabbitPass, rabbitVhost, rabbitEX, rabbitPort, movieTitle, releaseDates, genre):

    movieDict = {
        'title':movieTitle,
        'releasedates':releaseDates,
        'genre': genre

    }
    credentials = pika.PlainCredentials(RABBIT_USER,RABBIT_PASS)
    rabbitMQMessage = json.dumps(movieDict , sort_keys= True, indent = 4, default=str)
    connection = pika.BlockingConnection(pika.ConnectionParameters(rabbitMQServer, rabbitPort, rabbitVhost, credentials))
    channel = connection.channel()
    channel.basic_publish(exchange=rabbitEX, routing_key=rabbitQueue,body=rabbitMQMessage)





#For loop to navigate through JSON data
for i in rsp_json["results"]:

    action = 28    
    comedy = 35
    animation = 16
    horror = 27
    romance = 10749
    scifi = 878
       
    #print("genre: {}".format(i["genre_ids"]))
    for g in i["genre_ids"]:
        if comedy == g:
            comedyRec = i["title"]
            rd1 = i["release_date"]
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,comedyRec,rd1,"Comedy")
            print(i["title"]+" - is a comedy movie. It will be released on "+i["release_date"])

        if horror == g:
            horrorRec = i["title"]
            rd2 = i["release_date"]
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,horrorRec,rd2,"Horror")
            print(i["title"]+" - is a horror movie. It will be released on "+i["release_date"])

        if action == g:
            #i["title"] = actionRec
            actionRec =  i["title"]
            rd3 = i["release_date"]
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,actionRec,rd3,"Action")
            print(i["title"]+" - is a action movie. It will be released on "+i["release_date"])

        if scifi == g:
            scifiRec = i["title"]
            rd4 = i["release_date"]
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,scifi,rd4,"Scifi")
            print(i["title"]+" - is a science fiction movie. It will be released on "+i["release_date"])
        
        if romance == g:
            romanceRec = i["title"]
            rd5 = i["release_date"]
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,romanceRec,rd5,"Romance")
            print(i["title"]+" - is a romance movie. It will be released on "+i["release_date"])
        
        if animation == g:
            animationRec = i["title"]
            rd6 = i["release_date"]
            sendMovies(RABBIT_HOST,RABBIT_Q,RABBIT_USER,RABBIT_PASS,RABBIT_VH,RABBIT_EX,RABBIT_PORT,animationRec,rd6,"Animation")
            print(i["title"]+" - is a animation movie. It will be released on "+i["release_date"])
        
        
#print(data.decode("utf-8"))





                
