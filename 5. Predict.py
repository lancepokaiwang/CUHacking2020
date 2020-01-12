import Basic_Functions as bfs

# Predict Data
tweets = bfs.readJsonFile("tweets_preprocessed").items()

for id, content in tweets:
    body = content["body"]


