import Basic_Functions as bfs
import pymysql

prohibit_words = []
db = pymysql.connect("localhost", "root", "", "lancewgc_cuhacking2020")
cursor = db.cursor()
cursor.execute("SELECT word FROM filtering_words")
words = cursor.fetchone()
for word in words:
    prohibit_words.append(word)


def filtering_words(text):
    for word in prohibit_words:
        text = text.replace(word, "")
    return text


tweets = bfs.readJsonFile(name="data", folder="data").items()

print(len(tweets))

result = {}
for t_id, tweet in tweets:
    hashtags = []
    mentions = []

    for hashtag in tweet["entities"]["hashtags"]:
        hashtags.append(hashtag["text"])
    for mention in tweet["entities"]["user_mentions"]:
        mentions.append(mention["screen_name"])

    result[t_id] = {
        "created_at": tweet["created_at"],
        "body": tweet["text"],
        "hashtags": hashtags,
        "mentions": mentions
    }

bfs.writeJsonFile(result, "tweets_preprocessed", "data")
