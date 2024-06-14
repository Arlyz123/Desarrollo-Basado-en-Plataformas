from ariadne import ObjectType, QueryType, gql, make_executable_schema
from ariadne.asgi import GraphQL

# schema
type_defs = gql("""
    type Query {
        users: [User!]!
    }

    type User {
        id: ID!
        username: String!
        email: String!
    }
""")

# ejemplos
users_data = [
    {"id": 1, "username": "Arlyz", "email": "arlyzvalencia@gmail.com"},
    {"id": 2, "username": "Chato", "email": "chato@gmail.com"},
    {"id": 3, "username": "Francesco", "email": "fran@gmail.com"},
]

# Resolutores
query = QueryType()
user = ObjectType("User")

@query.field("users")
def resolve_users(_, info):
    return users_data

# construir esquema
schema = make_executable_schema(type_defs, query, user)

# config servidor graphql
app = GraphQL(schema, debug=True)

# para compilar - uvicorn main:app --reload