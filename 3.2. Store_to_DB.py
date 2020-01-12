import pymysql
import Basic_Functions as bfs
from sklearn import preprocessing

db = pymysql.connect("localhost", "root", "", "lancewgc_cuhacking2020")
cursor = db.cursor()

words = {}

data = bfs.readJsonFile("tweets_neg_tf", "data").items()
for id, content in data:
    for word in content["body"]:
        print(word)
        if word[0] not in words:
            words[word[0]] = word[1]
        else:
            words[word[0]] += word[1]
for word, value in words.items():
    sql = 'INSERT INTO tf_freq(word, score) VALUES ("{}", {})'.format(word, value)
    print(sql)
    cursor.execute(sql)
    db.commit()

words = None
words = {}

data = bfs.readJsonFile("tweets_neg_tf_idf", "data").items()
for id, content in data:
    for word in content["body"]:
        print(word)
        if word[0] not in words:
            words[word[0]] = word[1]
        else:
            words[word[0]] += word[1]
for word, value in words.items():
    sql = 'INSERT INTO tf_idf_freq(word, score) VALUES ("{}", {})'.format(word, value)
    print(sql)
    cursor.execute(sql)
    db.commit()
