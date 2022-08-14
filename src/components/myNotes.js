import $ from 'jquery'

class myNotes {
  constructor() {
    this.events()
  }

  events() {
    $('.note-delete').on('click', this.deleteNote)
  }

  deleteNote() {
    alert('delete')
  }
}

export default myNotes
