import pymysql.cursors
import pymysql

def sql_query(connection, query):
    try:
        cursor = connection.cursor()
        cursor.execute(query)
        res = cursor.fetchall()
        return res
    except:
        return -1

if __name__=="__main__":

    connection = pymysql.connect(
        host='localhost',
        user='movie_database',
        password='dbms_project',
        db='movie_database',
        charset='utf8mb4',
        cursorclass=pymysql.cursors.DictCursor
        )

    li = open("ge.txt", "r").readlines()[:-1]
    for i in range(len(li)):
        item = li[i].split('$')
        query1 = "select mid from Movies where movie_name=%s;"%("\""+item[0]+"\"")
        query2 = "select gid from Genres where genre_type=%s;"%("\""+item[1][:-1]+"\"")
        id1 = sql_query(connection, query1)
        id2 = sql_query(connection, query2)
        print(id1[0]["mid"], id2[0]["gid"])



