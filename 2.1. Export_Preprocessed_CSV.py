import csv
import Basic_Functions as bfs

dataset = bfs.readJsonFile(name="tweets_preprocessed", folder="data").items()

# Open CSV reader
with open('data/tweets_preprocessed.csv', 'w', newline='') as csvfile:
    # Create CSV writer
    writer = csv.writer(csvfile)
    # Write first row
    writer.writerow(
        ['id', 'body']
    )
    for id, data in dataset:
        writer.writerow(
            [id, data["body"]])
