import pymongo
import Basic_Functions as bfs


myclient = pymongo.MongoClient("mongodb://cuhacking:cuhacking@cluster0-shard-00-00-v3ugi.mongodb.net:27017,cluster0-shard-00-01-v3ugi.mongodb.net:27017,cluster0-shard-00-02-v3ugi.mongodb.net:27017/test?ssl=true&replicaSet=Cluster0-shard-0&authSource=admin&retryWrites=true&w=majority")
mydb = myclient["CUHacking"]

# mycol = mydb["tf_freq"]
# data = bfs.readJsonFile("tweets_neg_tf", "data").items()
# print(data)
# for id, content in data:
#     print({id:content})
#     x = mycol.insert_one({id:content})

mycol = mydb["tf_idf_freq"]
data = bfs.readJsonFile("tweets_neg_tf_idf", "data").items()
print(data)
for id, content in data:
    print({id:content})
    x = mycol.insert_one({id:content})

# mycol = mydb["tweet_processed"]
# data = bfs.readJsonFile("processed_tweets_neg_text", "data").items()
# print(data)
# for id, content in data:
#     print({id:content})
#     x = mycol.insert_one({id:content})
