# 4.8.7 Component Object
Menyimpan sekumpulan objek dimana objek tersebut dapat digunakan kembali untuk berbagai aspek OAS. Objek yang didefinisikan tidak berpengaruh pada API kecuali secara eksplisit direferensikan dari luar komponen objek.

## 4.8.7.1 Fixed Fields
| Nama Field | Tipe | Deskripsi |
| ---------- | ---- | --------- |
| schemas | Map[`string`, Schema Object] | Objects yang digunakan untuk menampung [Schema Object](https://spec.openapis.org/oas/v3.1.0#schemaObject) yang dapat digunakan kembali |
| responses | Map [string, Responses Object ¦ Reference Object](https://spec.openapis.org/oas/v3.1.0#referenceObject) | Objek yang digunakan untuk menampung [Responses Objects](https://spec.openapis.org/oas/v3.1.0#responseObject) dan dapat digunakan kembali |
| parameters | Map [string, Parameter Object ¦ Reference Object](https://spec.openapis.org/oas/v3.1.0#referenceObject) | Objek yang digunakan untuk menampung [Parameter Objects](https://spec.openapis.org/oas/v3.1.0#parameterObject) dan dapat digunakan kembali |
| examples | Map [string, Example Object ¦ Reference Object](https://spec.openapis.org/oas/v3.1.0#referenceObject) | Objek yang digunakan untuk menampung [Example Objects](https://spec.openapis.org/oas/v3.1.0#exampleObject) dan dapat digunakan kembali |
| requestBodies | Map [string, Request Body Object ¦ Reference Object](https://spec.openapis.org/oas/v3.1.0#referenceObject) | Objek yang digunakan untuk menampung [Request Body Objects](https://spec.openapis.org/oas/v3.1.0#requestBodyObject) dan dapat digunakan kembali |
| headers | Map [string, Header Object ¦ Reference Object](https://spec.openapis.org/oas/v3.1.0#referenceObject) | Objek yang digunakan untuk menampung [Header Objects](https://spec.openapis.org/oas/v3.1.0#headerObject) dan dapat digunakan kembali |
| securitySchemes | Map [string, Security Scheme Object ¦ Reference Object](https://spec.openapis.org/oas/v3.1.0#referenceObject) | Objek yang digunakan untuk menampung [Security Scheme Objects](https://spec.openapis.org/oas/v3.1.0#securitySchemeObject) dan dapat digunakan kembali |
| links | Map [string, Link Object ¦ Reference Object](https://spec.openapis.org/oas/v3.1.0#referenceObject) | Objek yang digunakan untuk menampung [Link Objects](https://spec.openapis.org/oas/v3.1.0#linkObject) dan dapat digunakan kembali |
| callbacks | Map [string, Callback Object ¦ Reference Object](https://spec.openapis.org/oas/v3.1.0#referenceObject) | Objek yang digunakan untuk menampung [Callback Objects](https://spec.openapis.org/oas/v3.1.0#callbackObject) dan dapat digunakan kembali |
| pathItems | Map [string, Path Item Object ¦ Reference Object](https://spec.openapis.org/oas/v3.1.0#referenceObject) | Objek yang digunakan untuk menampung [Path Item Object](https://spec.openapis.org/oas/v3.1.0#pathItemObject) dan dapat digunakan kembali |

Hal ini dijelaskan lebih lanjut dalam [Specification Extensions](http://spec.openapis.org/oas/v3.1.0#specificationExtensions)
Menggunakan key regular expression: ^[a-zA-Z0-9\.\-_]+$.

Contoh penamaan field
User
User_1
User_Name
user-name
my.org.User

## 4.8.7.2 Components Object Example
### Example1
"components": {
  "schemas": {
    "GeneralError": {
      "type": "object",
      "properties": {
        "code": {
          "type": "integer",
          "format": "int32"
        },
        "message": {
          "type": "string"
        }
      }
    },
    "Category": {
      "type": "object",
      "properties": {
        "id": {
          "type": "integer",
          "format": "int64"
        },
        "name": {
          "type": "string"
        }
      }
    },
    "Tag": {
      "type": "object",
      "properties": {
        "id": {
          "type": "integer",
          "format": "int64"
        },
        "name": {
          "type": "string"
        }
      }
    }
  },
  "parameters": {
    "skipParam": {
      "name": "skip",
      "in": "query",
      "description": "number of items to skip",
      "required": true,
      "schema": {
        "type": "integer",
        "format": "int32"
      }
    },
    "limitParam": {
      "name": "limit",
      "in": "query",
      "description": "max records to return",
      "required": true,
      "schema" : {
        "type": "integer",
        "format": "int32"
      }
    }
  },
  "responses": {
    "NotFound": {
      "description": "Entity not found."
    },
    "IllegalInput": {
      "description": "Illegal input for operation."
    },
    "GeneralError": {
      "description": "General Error",
      "content": {
        "application/json": {
          "schema": {
            "$ref": "#/components/schemas/GeneralError"
          }
        }
      }
    }
  },
  "securitySchemes": {
    "api_key": {
      "type": "apiKey",
      "name": "api_key",
      "in": "header"
    },
    "petstore_auth": {
      "type": "oauth2",
      "flows": {
        "implicit": {
          "authorizationUrl": "https://example.org/api/oauth/dialog",
          "scopes": {
            "write:pets": "modify pets in your account",
            "read:pets": "read your pets"
          }
        }
      }
    }
  }
}

### Example2
components:
  schemas:
    GeneralError:
      type: object
      properties:
        code:
          type: integer
          format: int32
        message:
          type: string
    Category:
      type: object
      properties:
        id:
          type: integer
          format: int64
        name:
          type: string
    Tag:
      type: object
      properties:
        id:
          type: integer
          format: int64
        name:
          type: string
  parameters:
    skipParam:
      name: skip
      in: query
      description: number of items to skip
      required: true
      schema:
        type: integer
        format: int32
    limitParam:
      name: limit
      in: query
      description: max records to return
      required: true
      schema:
        type: integer
        format: int32
  responses:
    NotFound:
      description: Entity not found.
    IllegalInput:
      description: Illegal input for operation.
    GeneralError:
      description: General Error
      content:
        application/json:
          schema:
            $ref: '#/components/schemas/GeneralError'
  securitySchemes:
    api_key:
      type: apiKey
      name: api_key
      in: header
    petstore_auth:
      type: oauth2
      flows: 
        implicit:
          authorizationUrl: https://example.org/api/oauth/dialog
          scopes:
            write:pets: modify pets in your account
            read:pets: read your pets
